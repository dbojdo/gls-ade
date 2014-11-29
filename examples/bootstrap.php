<?php
require __DIR__.'/../vendor/autoload.php';

use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\SerializerBuilder;
use Webit\GlsAde\Api\Factory\ApiFactory;
use Webit\SoapApi\Input\InputNormalizerSerializedBased;
use Webit\SoapApi\Hydrator\HydratorSerializer;
use Webit\SoapApi\Util\BinaryStringHelper;
use Webit\SoapApi\SoapClient\SoapClientFactory;
use Webit\GlsAde\Api\Exception\ExceptionFactory;

if (is_file(__DIR__ .'/config.php') == false) {
    throw new \LogicException('Missing required file "examples/config.php". Create it base on "examples/config.php.dist".');
}

$config = require __DIR__ .'/config.php';

AnnotationRegistry::registerAutoloadNamespace(
    'JMS\Serializer\Annotation',
    __DIR__.'/../vendor/jms/serializer/src'
);

$serializer = SerializerBuilder::create()->build();
$clientFactory = new SoapClientFactory();
$normalizer = new InputNormalizerSerializedBased($serializer, array('input'));
$hydrator = new HydratorSerializer($serializer, new BinaryStringHelper());
$exceptionFactory = new ExceptionFactory();

$apiFactory = new ApiFactory($clientFactory, $normalizer, $hydrator, $exceptionFactory, $config['test-env']);

return $apiFactory;
