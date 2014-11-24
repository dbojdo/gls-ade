<?php
/** @var \Webit\GlsAde\Api\Factory\ApiFactory $apiFactory */
$apiFactory = require 'bootstrap.php';

$username = 'my-test-username';
$password = 'my-test-password';

$authApi = $apiFactory->createAuthApi();
$postCodesApi = $apiFactory->createPostCodeApi($authApi, $username, $password);

$country = 'PL';
$postCode = '30-855';

$city = $postCodesApi->getCity($country, $postCode);
printf("City for country \"%s\" and post code \"%s\": %s\n", $country, $postCode, $city);
