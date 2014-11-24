<?php
require __DIR__.'/../vendor/autoload.php';

use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\SerializerBuilder;
use Webit\GlsAde\Api\Factory\ApiFactory;
use Webit\GlsAde\Api\Factory\SoapClientFactory;
use Webit\GlsAde\Api\ResultMap\ResultTypeMap;
use Webit\GlsAde\Api\ResultMap\ResultMapLoader;

AnnotationRegistry::registerAutoloadNamespace(
    'JMS\Serializer\Annotation',
    __DIR__.'/../vendor/jms/serializer/src'
);

$serializer = SerializerBuilder::create()->build();
$clientFactory = new SoapClientFactory();

$resultMap = new ResultTypeMap();
$mapLoader = new ResultMapLoader();
$mapLoader->loadFromYaml($resultMap, new \SplFileInfo(__DIR__.'/../src/Resources/result-type-map.yml'));

$apiFactory = new ApiFactory($clientFactory, $serializer, $resultMap);

return $apiFactory;
