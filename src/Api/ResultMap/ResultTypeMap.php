<?php
/**
 * ResultTypeMap.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created on Nov 24, 2014, 11:29
 */

namespace Webit\GlsAde\Api\ResultMap;

/**
 * Class ResultTypeMap
 * @package Webit\GlsAde\Api
 */
class ResultTypeMap implements ResultTypeMapInterface
{
    /**
     * @var array
     */
    private $types = array();

    /**
     * @var string
     */
    private $fallbackType = 'ArrayCollection';

    /**
     * @param string $soapFunction
     * @return string
     */
    public function getResultType($soapFunction)
    {
        return isset($this->types[$soapFunction]) ? $this->types[$soapFunction] : $this->fallbackType;
    }

    /**
     * @param string $soapFunction
     * @param string $type
     */
    public function registerResultType($soapFunction, $type)
    {
        $this->types[$soapFunction] = $type;
    }
}
