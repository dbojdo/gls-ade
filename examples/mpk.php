<?php
/** @var \Webit\GlsAde\Api\Factory\ApiFactory $apiFactory */
$apiFactory = require 'bootstrap.php';

$username = 'my-test-username';
$password = 'my-test-password';

$authApi = $apiFactory->createAuthApi();
$senderApi = $apiFactory->createMpkApi($authApi, $username, $password);
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
