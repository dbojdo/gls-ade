<?php
/**
 * File: ApiFactory.php
 * Created at: 2014-11-21 22:04
 */
 
namespace Webit\GlsAde\Api;

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

    public function __construct(SoapClientFactory $soapClientFactory)
    {
        $this->soapClientFactory = $soapClientFactory;
    }

    /**
     * @return AuthApi
     */
    public function createAuthApi()
    {
        return new AuthApi(
            $this->soapClientFactory->createSoapClient(self::GLS_ADE_WSDL)
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
            $this->soapClientFactory->createSoapClient(self::GLS_ADE_WSDL),
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
            $this->soapClientFactory->createSoapClient(self::GLS_ADE_WSDL),
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
            $this->soapClientFactory->createSoapClient(self::GLS_ADE_WSDL),
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
            $this->soapClientFactory->createSoapClient(self::GLS_ADE_WSDL),
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
            $this->soapClientFactory->createSoapClient(self::GLS_ADE_WSDL),
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
            $this->soapClientFactory->createSoapClient(self::GLS_ADE_WSDL),
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
            $this->soapClientFactory->createSoapClient(self::GLS_ADE_WSDL),
            $authApi,
            $username,
            $password
        );
    }
}
