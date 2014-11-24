<?php
/**
 * ResultMapLoader.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@dxi.eu>
 * Created on Nov 24, 2014, 11:49
 * Copyright (C) DXI Ltd
 */

namespace Webit\GlsAde\Api\ResultMap;

use Symfony\Component\Yaml\Yaml;

/**
 * Class ResultMapLoader
 * @package Webit\GlsAde\Api\ResultMap
 */
class ResultMapLoader
{
    public function loadFromYaml(ResultTypeMapInterface $resultTypeMap, \SplFileInfo $file)
    {
        $data = Yaml::parse($file->getPathname());
        foreach ($data['result_type_map'] as $soapFunction => $type) {
            $resultTypeMap->registerResultType($soapFunction, $type);
        }
    }
}
