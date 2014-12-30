<?php
/** @var \Webit\GlsAde\Api\Factory\ApiFactory $apiFactory */
$apiFactory = require 'bootstrap.php';

/** @var array $config */

$authApi = $apiFactory->createAuthApi($config['test-env']);
$postCodesApi = $apiFactory->createPostCodeApi($authApi, $account, $config['test-env']);

$country = 'PL';
$postCode = '30-855';

$city = $postCodesApi->getCity($country, $postCode);
printf("City for country \"%s\" and post code \"%s\": %s\n", $country, $postCode, $city);
