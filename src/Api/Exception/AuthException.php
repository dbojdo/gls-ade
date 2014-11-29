<?php
/**
 * File: AuthException.php
 * Created at: 2014-11-24 06:59
 */
 
namespace Webit\GlsAde\Api\Exception;

/**
 * Class AuthException
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
class AuthApiException extends \RuntimeException implements GleAdeApiException
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
