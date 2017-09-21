<?php

namespace Webit\GlsAde\Api\Exception;

use Webit\SoapApi\Exception\ExceptionFactoryInterface;

/**
 * Class ExceptionFactory
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
class ExceptionFactory implements ExceptionFactoryInterface
{
    /**
     * Wraps exception to API's type
     *
     * @param \Exception $e
     * @param string $soapFunction
     * @param $input
     * @return \Exception
     */
    public function createException(\Exception $e, $soapFunction, $input)
    {
        if ($e instanceof \SoapFault) {
            switch ($e->faultcode) {
                default:
                    throw InvalidInputDataException::createExceptionFromSoapFault($e);
            }
        }

        return $e;
    }
}
