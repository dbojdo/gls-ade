<?php
/**
 * File: ApiFactory.php
 * Created at: 2014-11-21 22:04
 */
 
namespace Webit\GlsAde\Api\Factory;

use Webit\GlsAde\Api\AuthApi;
use Webit\GlsAde\Api\ConsignmentPrepareApi;
use Webit\GlsAde\Api\MpkApi;
use Webit\GlsAde\Api\PickupApi;
use Webit\GlsAde\Api\PostCodeApi;
use Webit\GlsAde\Api\ProfileApi;
use Webit\GlsAde\Api\SenderAddressApi;
use Webit\GlsAde\Api\ServiceApi;
use Webit\GlsAde\Model\AdeAccount;
use Webit\SoapApi\Exception\ExceptionFactoryInterface;
use Webit\SoapApi\Hydrator\HydratorInterface;
use Webit\SoapApi\Input\InputNormalizerInterface;
use Webit\SoapApi\SoapApiExecutor;
use Webit\SoapApi\SoapApiExecutorFactory;
use Webit\SoapApi\SoapClient\SoapClientFactoryInterface;

/**
 * Class ApiFactory
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
class ApiFactory
{

    const GLS_ADE_WSDL_TEST = 'https://ade-test.gls-poland.com/adeplus/pm1/ade_webapi.php?wsdl';
    const GLS_ADE_WSDL = 'https://adeplus.gls-poland.com/adeplus/pm1/ade_webapi.php?wsdl';

    /**
     * @var SoapClientFactoryInterface
     */
    private $soapClientFactory;

    /**
     * @var SoapApiExecutorFactory
     */
    private $executorFactory;

    /**
     * @var InputNormalizerInterface
     */
    private $normalizer;

    /**
     * @var HydratorInterface
     */
    private $hydrator;

    /**
     * @var ExceptionFactoryInterface
     */
    private $exceptionFactory;

    /**
     * @var array
     */
    private $executor = array();

    public function __construct(
        SoapClientFactoryInterface $soapClientFactory,
        SoapApiExecutorFactory $executorFactory,
        InputNormalizerInterface $normalizer,
        HydratorInterface $hydrator,
        ExceptionFactoryInterface $exceptionFactory
    ) {
        $this->soapClientFactory = $soapClientFactory;
        $this->executorFactory = $executorFactory;
        $this->normalizer = $normalizer;
        $this->hydrator = $hydrator;
        $this->exceptionFactory = $exceptionFactory;
    }

    /**
     * @param bool $testEnvironment
     * @return \SoapClient|SoapApiExecutor
     */
    private function getExecutor($testEnvironment = false)
    {
        $key = $testEnvironment ? 'test' : 'prod';
        if (isset($this->executor[$key]) == false) {
            $this->executor[$key] = $this->executorFactory->createExecutor(
                $this->soapClientFactory->createSoapClient(
                    $testEnvironment ? self::GLS_ADE_WSDL_TEST : self::GLS_ADE_WSDL
                ),
                $this->normalizer,
                $this->hydrator,
                null,
                $this->exceptionFactory
            );
        }

        return $this->executor[$key];
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
     * @param AuthApi $authApi
     * @param AdeAccount $account
     * @return MpkApi
     */
    public function createMpkApi(AuthApi $authApi, AdeAccount $account)
    {
        return new MpkApi(
            $this->getExecutor($account->isTestMode()),
            $authApi,
            $account
        );
    }

    /**
     * @param AuthApi $authApi
     * @param AdeAccount $account
     * @return ConsignmentPrepareApi
     */
    public function createConsignmentPrepareApi(AuthApi $authApi, AdeAccount $account)
    {
        return new ConsignmentPrepareApi(
            $this->getExecutor($account->isTestMode()),
            $authApi,
            $account
        );
    }

    /**
     * @param AuthApi $authApi
     * @param AdeAccount $account
     * @return ProfileApi
     */
    public function createProfileApi(AuthApi $authApi, AdeAccount $account)
    {
        return new ProfileApi(
            $this->getExecutor($account->isTestMode()),
            $authApi,
            $account
        );
    }

    /**
     * @param AuthApi $authApi
     * @param AdeAccount $account
     * @return ServiceApi
     */
    public function createServiceApi(AuthApi $authApi, AdeAccount $account)
    {
        return new ServiceApi(
            $this->getExecutor($account->isTestMode()),
            $authApi,
            $account
        );
    }

    /**
     * @param AuthApi $authApi
     * @param AdeAccount $account
     * @return SenderAddressApi
     */
    public function createSenderAddressApi(AuthApi $authApi, AdeAccount $account)
    {
        return new SenderAddressApi(
            $this->getExecutor($account->isTestMode()),
            $authApi,
            $account
        );
    }

    /**
     * @param AuthApi $authApi
     * @param AdeAccount $account
     * @return PostCodeApi
     */
    public function createPostCodeApi(AuthApi $authApi, AdeAccount $account)
    {
        return new PostCodeApi(
            $this->getExecutor($account->isTestMode()),
            $authApi,
            $account
        );
    }

    /**
     * @param AuthApi $authApi
     * @param AdeAccount $account
     * @return PickupApi
     */
    public function createPickupApi(AuthApi $authApi, AdeAccount $account)
    {
        return new PickupApi(
            $this->getExecutor($account->isTestMode()),
            $authApi,
            $account
        );
    }
}
