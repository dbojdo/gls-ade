<?php
/** @var \Webit\GlsAde\Api\Factory\ApiFactory $apiFactory */
$apiFactory = require 'bootstrap.php';

$username = 'my-test-username';
$password = 'my-test-password';

$authApi = $apiFactory->createAuthApi();
$sessionId = $authApi->login($username, $password);

printf("Session with ID \"%s\" has been created\n", $sessionId);

$sessionId = $authApi->logout($sessionId);
printf("Session with ID \"%s\" has been terminated\n", $sessionId);
