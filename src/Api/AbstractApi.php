<?php
/**
 * File: AbstractApi.php
 * Created at: 2014-11-21 20:40
 */
 
namespace Webit\GlsAde\Api;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Webit\GlsAde\Api\ResultMap\ResultTypeMapInterface;

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
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var ResultTypeMapInterface
     */
    private $resultTypeMap;

    /**
     * @param \SoapClient $client
     * @param SerializerInterface $serializer
     * @param ResultTypeMapInterface $resultTypeMap
     */
    public function __construct(
        \SoapClient $client,
        SerializerInterface $serializer,
        ResultTypeMapInterface $resultTypeMap
    ) {
        $this->client = $client;
        $this->serializer = $serializer;
        $this->resultTypeMap = $resultTypeMap;
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
        try {
            $input = $this->normalizeInput($arguments);
            $response = $this->client->__soapCall($soapFunction, $input);

            return $this->deserializeOutput($soapFunction, json_encode($response));
        } catch (\SoapFault $e) {
            // TODO: create appropriate exception
            throw $e;
        }
    }

    /**
     * @param array $arguments
     * @return array
     */
    private function normalizeInput(array $arguments)
    {
        $json = $this->serializer->serialize(
            $arguments,
            'json',
            SerializationContext::create()->setGroups(array('input'))
        );

        return $this->serializer->deserialize($json, 'array', 'json');
    }

    /**
     * @param $soapFunction
     * @param $json
     * @return mixed
     */
    private function deserializeOutput($soapFunction, $json)
    {
        $outputType = $this->resultTypeMap->getResultType($soapFunction);

        $result = $this->serializer->deserialize($json, $outputType, 'json');

        // FIX for serializer
        if (substr($outputType, 0, strlen('ArrayCollection')) == 'ArrayCollection' && is_array($result)) {
            return new ArrayCollection($result);
        }

        return $result;
    }
}
