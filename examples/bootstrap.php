<?php
require __DIR__.'/../vendor/autoload.php';

use Doctrine\Common\Annotations\AnnotationRegistry;
use Webit\GlsAde\Api\Factory\ApiFactory;
use Webit\GlsAde\Model\AdeAccount;

if (is_file(__DIR__ .'/config.php') == false) {
    throw new \LogicException('Missing required file "examples/config.php". Create it base on "examples/config.php.dist".');
}

$config = require __DIR__ .'/config.php';

AnnotationRegistry::registerAutoloadNamespace(
    'JMS\Serializer\Annotation',
    __DIR__.'/../vendor/jms/serializer/src'
);

$apiFactory = new ApiFactory();
$account = new AdeAccount($config['username'], $config['password'], $config['test-env']);

return $apiFactory;
