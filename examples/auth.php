<?php
require __DIR__.'/../vendor/autoload.php';

use Webit\GlsAde\Api\ApiFactory;
use Webit\GlsAde\Api\SoapClientFactory;

$username = 'my-test-username';
$password = 'my-test-password';

$clientFactory = new SoapClientFactory();
$apiFactory = new ApiFactory($clientFactory);

$authApi = $apiFactory->createAuthApi();
$sessionId = $authApi->login($username, $password);

printf("Session with ID \"%s\" has been created\n", $sessionId);

$sessionId = $authApi->logout($sessionId);
printf("Session with ID \"%s\" has been terminated\n", $sessionId);
