<?php
/**
 * ResultTypeMapInterface.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@dxi.eu>
 * Created on Nov 24, 2014, 11:32
 * Copyright (C) DXI Ltd
 */

namespace Webit\GlsAde\Api\ResultMap;

/**
 * Interface ResultTypeMapInterface
 * @package Webit\GlsAde\Api
 */
interface ResultTypeMapInterface
{
    /**
     * @param string $soapFunction
     * @return string
     */
    public function getResultType($soapFunction);

    /**
     * @param string $soapFunction
     * @param string $type
     */
    public function registerResultType($soapFunction, $type);
}
 