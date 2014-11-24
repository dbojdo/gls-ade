<?php
/**
 * ResultMapLoader.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created on Nov 24, 2014, 11:49
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
