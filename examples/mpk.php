<?php
/** @var \Webit\GlsAde\Api\Factory\ApiFactory $apiFactory */
$apiFactory = require 'bootstrap.php';

/** @var array $config */

$authApi = $apiFactory->createAuthApi($config['test-env']);
$senderApi = $apiFactory->createMpkApi($authApi, $account, $config['test-env']);
$status = $senderApi->getMpkStatus();

printf("Status of MPK: %d\n", $status);

$mpkList = $senderApi->getMpkDictionary();
if ($mpkList->count() > 0) {
    echo "MPK Dictionary:\n";
    foreach ($mpkList as $mpk) {
        printf("MPK: %s\n", $mpk);
    }
} else {
    echo "No items in MPK Dictionary\n";
}
