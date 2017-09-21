<?php
/** @var \Webit\GlsAde\Api\Factory\ApiFactory $apiFactory */
$apiFactory = require 'bootstrap.php';

/** @var array $config */

$mpkApi = $apiFactory->createMpkApi($account);
$status = $mpkApi->getMpkStatus();

printf("Status of MPK: %d\n", $status);

$mpk = $mpkApi->getMpkDictionary();
if ($mpk) {
    echo "MPK Dictionary:\n";
        printf("MPK: %s\n", $mpk);
} else {
    echo "No items in MPK Dictionary\n";
}
