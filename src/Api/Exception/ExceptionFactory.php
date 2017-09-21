<?php

namespace Webit\GlsAde\Api\Exception;

use Webit\SoapApi\Executor\Exception\ExecutorException;

/**
 * Class ExceptionFactory
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
class ExceptionFactory
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
        if (! ($e instanceof ExecutorException)) {
            return $e;
        }

        $e = $e->getPrevious();
        if ($e instanceof \SoapFault) {
            switch ($e->faultcode) {
                default:
                    throw InvalidInputDataException::createExceptionFromSoapFault($e);
            }
        }

        return $e;
    }
}
