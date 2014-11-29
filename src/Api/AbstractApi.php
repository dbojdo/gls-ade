<?php
/**
 * File: AbstractApi.php
 * Created at: 2014-11-21 20:40
 */
 
namespace Webit\GlsAde\Api;

use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Webit\GlsAde\Api\ResultMap\ResultTypeMapInterface;
use Webit\SoapApi\SoapApiExecutorInterface;

/**
 * Class AbstractApi
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
abstract class AbstractApi
{
    /**
     * @var SoapApiExecutorInterface
     */
    private $executor;

    /**
     * @param SoapApiExecutorInterface $executor
     */
    public function __construct(SoapApiExecutorInterface $executor)
    {
        $this->executor = $executor;
    }

    /**
     * @param string $soapFunction
     * @param mixed $arguments
     * @throws \Exception
     * @throws \SoapFault
     * @return mixed
     */
    protected function request($soapFunction, $arguments = null, $resultType = 'ArrayCollection')
    {
        return $this->executor->executeSoapFunction($soapFunction, $arguments, $resultType);
    }
}
