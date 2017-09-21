<?php

namespace Webit\GlsAde\Api\Exception;

/**
 * Class AuthException
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
class AuthApiException extends \RuntimeException implements GlsAdeApiException
{
    /**
     * @return string
     */
    public function getApiErrorCode()
    {
        $previous = $this->getPrevious();
        if ($previous instanceof \SoapFault) {
            return $previous->faultcode;
        }

        return null;
    }
}
