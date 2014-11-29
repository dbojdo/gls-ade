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
use Webit\SoapApi\Exception\ExceptionFactoryInterface;
use Webit\SoapApi\Hydrator\HydratorInterface;
use Webit\SoapApi\Input\InputNormalizerInterface;
use Webit\SoapApi\SoapApiExecutor;
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
     * @var bool
     */
    private $testEnvironment = false;

    /**
     * @var \SoapClient
     */
    private $executor;

    public function __construct(
        SoapClientFactoryInterface $soapClientFactory,
        InputNormalizerInterface $normalizer,
        HydratorInterface $hydrator,
        ExceptionFactoryInterface $exceptionFactory,
        $testEnvironment = false
    ) {
        $this->soapClientFactory = $soapClientFactory;
        $this->normalizer = $normalizer;
        $this->hydrator = $hydrator;
        $this->exceptionFactory;
        $this->testEnvironment = $testEnvironment;
    }

    /**
     * @return \SoapClient|SoapApiExecutor
     */
    private function getExecutor()
    {
        if ($this->executor == null) {
            $this->executor = new SoapApiExecutor(
                $this->soapClientFactory->createSoapClient(
                    $this->testEnvironment ? self::GLS_ADE_WSDL_TEST : self::GLS_ADE_WSDL
                ),
                $this->normalizer,
                $this->hydrator,
                null,
                $this->exceptionFactory
            );
        }

        return $this->executor;
    }

    /**
     * @return AuthApi
     */
    public function createAuthApi()
    {
        return new AuthApi(
            $this->getExecutor()
        );
    }

    /**
     * @param AuthApi $authApi
     * @param string $username
     * @param string $password
     * @return MpkApi
     */
    public function createMpkApi(AuthApi $authApi, $username, $password)
    {
        return new MpkApi(
            $this->getExecutor(),
            $authApi,
            $username,
            $password
        );
    }

    /**
     * @param AuthApi $authApi
     * @param string $username
     * @param string $password
     * @return ConsignmentPrepareApi
     */
    public function createConsignmentPrepareApi(AuthApi $authApi, $username, $password)
    {
        return new ConsignmentPrepareApi(
            $this->getExecutor(),
            $authApi,
            $username,
            $password
        );
    }

    /**
     * @param AuthApi $authApi
     * @param string $username
     * @param string $password
     * @return ProfileApi
     */
    public function createProfileApi(AuthApi $authApi, $username, $password)
    {
        return new ProfileApi(
            $this->getExecutor(),
            $authApi,
            $username,
            $password
        );
    }

    /**
     * @param AuthApi $authApi
     * @param string $username
     * @param string $password
     * @return ServiceApi
     */
    public function createServiceApi(AuthApi $authApi, $username, $password)
    {
        return new ServiceApi(
            $this->getExecutor(),
            $authApi,
            $username,
            $password
        );
    }

    /**
     * @param AuthApi $authApi
     * @param string $username
     * @param string $password
     * @return SenderAddressApi
     */
    public function createSenderAddressApi(AuthApi $authApi, $username, $password)
    {
        return new SenderAddressApi(
            $this->getExecutor(),
            $authApi,
            $username,
            $password
        );
    }

    /**
     * @param AuthApi $authApi
     * @param string $username
     * @param string $password
     * @return PickupApi
     */
    public function createPickupApi(AuthApi $authApi, $username, $password)
    {
        return new PickupApi(
            $this->getExecutor(),
            $authApi,
            $username,
            $password
        );
    }

    /**
     * @param AuthApi $authApi
     * @param string $username
     * @param string $password
     * @return PostCodeApi
     */
    public function createPostCodeApi(AuthApi $authApi, $username, $password)
    {
        return new PostCodeApi(
            $this->getExecutor(),
            $authApi,
            $username,
            $password
        );
    }
}
