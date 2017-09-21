<?php

namespace Webit\GlsAde\Api\Factory;

use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use Webit\GlsAde\Api\AuthApi;
use Webit\GlsAde\Api\ConsignmentPrepareApi;
use Webit\GlsAde\Api\MpkApi;
use Webit\GlsAde\Api\PickupApi;
use Webit\GlsAde\Api\PostCodeApi;
use Webit\GlsAde\Api\ProfileApi;
use Webit\GlsAde\Api\SenderAddressApi;
use Webit\GlsAde\Api\ServiceApi;
use Webit\GlsAde\Model\AdeAccount;
use Webit\SoapApi\Executor\SoapApiExecutorBuilder;
use Webit\SoapApi\Hydrator\ArrayHydrator;
use Webit\SoapApi\Hydrator\ChainHydrator;
use Webit\SoapApi\Hydrator\HydratorSerializerBased;
use Webit\SoapApi\Hydrator\Serializer\ResultTypeMap;
use Webit\SoapApi\Input\InputNormaliserSerializerBased;
use Webit\SoapApi\Input\Serializer\StaticSerializationContextFactory;
use Webit\SoapApi\Util\StdClassToArray;

/**
 * Class ApiFactory
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
class ApiFactory
{
    const GLS_ADE_WSDL_TEST = 'https://ade-test.gls-poland.com/adeplus/pm1/ade_webapi.php?wsdl';
    const GLS_ADE_WSDL = 'https://adeplus.gls-poland.com/adeplus/pm1/ade_webapi.php?wsdl';

    /** @var array */
    private $executor = array();

    /**
     * @return ApiFactory
     */
    public static function create()
    {
        return new self();
    }

    /**
     * @param bool $testEnvironment
     * @return \Webit\SoapApi\Executor\SoapApiExecutor
     */
    private function getExecutor($testEnvironment = false)
    {
        $key = $testEnvironment ? 'test' : 'prod';
        if (isset($this->executor[$key])) {
            return $this->executor[$key];
        }

        $serializer = SerializerBuilder::create()->build();

        $executorBuilder = new SoapApiExecutorBuilder();
        $executorBuilder->setInputNormaliser(
            new InputNormaliserSerializerBased(
                $serializer,
                new StaticSerializationContextFactory(array(), true)
            )
        );

        $executorBuilder->setHydrator($this->hydrator($serializer));

        $executorBuilder->setWsdl($testEnvironment ? self::GLS_ADE_WSDL_TEST : self::GLS_ADE_WSDL);

        $this->executor[$key] = $executor = $executorBuilder->build();

        return $executor;
    }

    /**
     * @param bool $testEnvironment
     * @return AuthApi
     */
    public function createAuthApi($testEnvironment = false)
    {
        return new AuthApi(
            $this->getExecutor($testEnvironment)
        );
    }

    /**
     * @param AdeAccount $account
     * @return MpkApi
     */
    public function createMpkApi(AdeAccount $account)
    {
        return new MpkApi(
            $this->getExecutor($account->isTestMode()),
            $this->createAuthApi($account->isTestMode()),
            $account
        );
    }

    /**
     * @param AdeAccount $account
     * @return ConsignmentPrepareApi
     */
    public function createConsignmentPrepareApi(AdeAccount $account)
    {
        return new ConsignmentPrepareApi(
            $this->getExecutor($account->isTestMode()),
            $this->createAuthApi($account->isTestMode()),
            $account
        );
    }

    /**
     * @param AdeAccount $account
     * @return ProfileApi
     */
    public function createProfileApi(AdeAccount $account)
    {
        return new ProfileApi(
            $this->getExecutor($account->isTestMode()),
            $this->createAuthApi($account->isTestMode()),
            $account
        );
    }

    /**
     * @param AdeAccount $account
     * @return ServiceApi
     */
    public function createServiceApi(AdeAccount $account)
    {
        return new ServiceApi(
            $this->getExecutor($account->isTestMode()),
            $this->createAuthApi($account->isTestMode()),
            $account
        );
    }

    /**
     * @param AdeAccount $account
     * @return SenderAddressApi
     */
    public function createSenderAddressApi(AdeAccount $account)
    {
        return new SenderAddressApi(
            $this->getExecutor($account->isTestMode()),
            $this->createAuthApi($account->isTestMode()),
            $account
        );
    }

    /**
     * @param AdeAccount $account
     * @return PostCodeApi
     */
    public function createPostCodeApi(AdeAccount $account)
    {
        return new PostCodeApi(
            $this->getExecutor($account->isTestMode()),
            $this->createAuthApi($account->isTestMode()),
            $account
        );
    }

    /**
     * @param AdeAccount $account
     * @return PickupApi
     */
    public function createPickupApi(AdeAccount $account)
    {
        return new PickupApi(
            $this->getExecutor($account->isTestMode()),
            $this->createAuthApi($account->isTestMode()),
            $account
        );
    }

    /**
     * @param Serializer $serializer
     * @return ChainHydrator
     */
    private function hydrator(Serializer $serializer)
    {
        return new ChainHydrator(
            array(
                new ArrayHydrator(new StdClassToArray()),
                new HydratorSerializerBased(
                    $serializer,
                    new ResultTypeMap(
                        array(
                            'adeProfile_GetIDs' => 'ArrayCollection<Webit\GlsAde\Model\Profile>',
                            'adeProfile_Change' => 'Webit\GlsAde\Model\Profile',
                            'adePreparingBox_GetConsign' => 'Webit\GlsAde\Model\Consignment',
                            'adePickup_Get' => 'Webit\GlsAde\Model\Pickup',
                            'adePickup_GetConsign' => 'Webit\GlsAde\Model\Consignment',
                            'adePickup_ParcelNumberSearch' => 'Webit\GlsAde\Model\Consignment',
                            'adeSendAddr_GetDictionary' => 'ArrayCollection<Webit\GlsAde\Model\SenderAddress>',
                            'adeServices_GetAllowed' => 'Webit\GlsAde\Model\ServiceList',
                            'adeServices_GetMaxParcelWeights' => 'Webit\GlsAde\Model\MaxParcelWeight',
                            'adeServices_GetGuaranteed' => 'Webit\GlsAde\Model\ServiceList'
                        ),
                        'ArrayCollection'
                    )
                )
            )
        );
    }
}
