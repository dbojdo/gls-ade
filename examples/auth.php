<?php
/** @var \Webit\GlsAde\Api\Factory\ApiFactory $apiFactory */
$apiFactory = require 'bootstrap.php';

$authApi = $apiFactory->createAuthApi($config['test-env']);
$sessionId = $authApi->login($config['username'], $config['password']);

printf("Session with ID \"%s\" has been created\n", $sessionId);

$sessionId = $authApi->logout($sessionId);
printf("Session with ID \"%s\" has been terminated\n", $sessionId);
