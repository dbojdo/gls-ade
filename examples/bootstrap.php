<?php
require __DIR__.'/../vendor/autoload.php';

use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\SerializerBuilder;
use Webit\GlsAde\Api\Factory\ApiFactory;
use Webit\SoapApi\Input\InputNormalizerSerializerBased;
use Webit\SoapApi\Hydrator\HydratorSerializerBased;
use Webit\SoapApi\Util\BinaryStringHelper;
use Webit\SoapApi\SoapClient\SoapClientFactory;
use Webit\GlsAde\Api\Exception\ExceptionFactory;
use Webit\SoapApi\SoapApiExecutorFactory;
use Webit\GlsAde\Model\AdeAccount;

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
$executorFactory = new SoapApiExecutorFactory();
$normalizer = new InputNormalizerSerializerBased($serializer, array('input'));
$hydrator = new HydratorSerializerBased($serializer, new BinaryStringHelper());
$exceptionFactory = new ExceptionFactory();

$apiFactory = new ApiFactory($clientFactory, $executorFactory, $normalizer, $hydrator, $exceptionFactory);
$account = new AdeAccount($config['username'], $config['password'], $config['test-env']);

return $apiFactory;
