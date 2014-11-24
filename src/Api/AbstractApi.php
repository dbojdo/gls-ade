<?php
/**
 * File: AbstractApi.php
 * Created at: 2014-11-21 20:40
 */
 
namespace Webit\GlsAde\Api;

/**
 * Class AbstractApi
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
abstract class AbstractApi
{
    /**
     * @var \SoapClient
     */
    private $client;

    /**
     * @param \SoapClient $client
     */
    public function __construct(
        \SoapClient $client
    ) {
        $this->client = $client;
    }

    /**
     * @param string $soapFunction
     * @param array $arguments
     * @throws \Exception
     * @throws \SoapFault
     * @return mixed
     */
    protected function request($soapFunction, array $arguments = array())
    {
        // TODO: arguments' normalization
        if ($this instanceof SessionAwareApiInterface) {
            $arguments['session'] = $this->getSessionId();
        }

        try {
            $response = $this->client->__soapCall($soapFunction, $arguments);
            return (array) $response;
        } catch (\SoapFault $e) {
            // TODO: create appropriate exception
            throw $e;
        }
    }
}
