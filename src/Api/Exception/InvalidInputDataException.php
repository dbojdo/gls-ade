<?php
/**
 * File: InvalidInputDataException.php
 * Created at: 2014-11-24 07:04
 */
 
namespace Webit\GlsAde\Api\Exception;

/**
 * Class InvalidInputDataException
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
class InvalidInputDataException extends \InvalidArgumentException implements GlsAdeApiException
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
 