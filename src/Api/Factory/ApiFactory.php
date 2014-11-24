<?php
/**
 * File: ApiFactory.php
 * Created at: 2014-11-21 22:04
 */
 
namespace Webit\GlsAde\Api\Factory;

use JMS\Serializer\SerializerInterface;
use Webit\GlsAde\Api\AuthApi;
use Webit\GlsAde\Api\ConsignmentPrepareApi;
use Webit\GlsAde\Api\MpkApi;
use Webit\GlsAde\Api\PickupApi;
use Webit\GlsAde\Api\PostCodeApi;
use Webit\GlsAde\Api\ProfileApi;
use Webit\GlsAde\Api\ResultMap\ResultTypeMapInterface;
use Webit\GlsAde\Api\SenderAddressApi;
use Webit\GlsAde\Api\ServiceApi;

/**
 * Class ApiFactory
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
class ApiFactory
{

    const GLS_ADE_WSDL = 'https://ade-test.gls-poland.com/adeplus/pm1/ade_webapi.php?wsdl';

    /**
     * @var SoapClientFactory
     */
    private $soapClientFactory;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var ResultTypeMapInterface
     */
    private $resultTypeMap;

    /**
     * @var \SoapClient
     */
    private $soapClient;

    public function __construct(SoapClientFactory $soapClientFactory, SerializerInterface $serializer, ResultTypeMapInterface $resultTypeMap)
    {
        $this->soapClientFactory = $soapClientFactory;
        $this->serializer = $serializer;
        $this->resultTypeMap = $resultTypeMap;
    }

    /**
     * @return AuthApi
     */
    public function createAuthApi()
    {
        return new AuthApi(
            $this->getSoapClient(),
            $this->serializer,
            $this->resultTypeMap
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
            $this->getSoapClient(),
            $this->serializer,
            $this->resultTypeMap,
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
            $this->getSoapClient(),
            $this->serializer,
            $this->resultTypeMap,
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
            $this->getSoapClient(),
            $this->serializer,
            $this->resultTypeMap,
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
            $this->getSoapClient(),
            $this->serializer,
            $this->resultTypeMap,
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
            $this->getSoapClient(),
            $this->serializer,
            $this->resultTypeMap,
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
            $this->getSoapClient(),
            $this->serializer,
            $this->resultTypeMap,
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
            $this->getSoapClient(),
            $this->serializer,
            $this->resultTypeMap,
            $authApi,
            $username,
            $password
        );
    }

    /**
     * @return \SoapClient
     */
    private function getSoapClient()
    {
        if ($this->soapClient == null) {
            $this->soapClient = $this->soapClientFactory->createSoapClient(self::GLS_ADE_WSDL, array());
        }

        return $this->soapClient;
    }
}
