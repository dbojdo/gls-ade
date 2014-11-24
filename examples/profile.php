<?php
/** @var \Webit\GlsAde\Api\Factory\ApiFactory $apiFactory */
$apiFactory = require 'bootstrap.php';

$username = 'my-test-username';
$password = 'my-test-password';

$authApi = $apiFactory->createAuthApi();
$profileApi = $apiFactory->createProfileApi($authApi, $username, $password);
$profiles = $profileApi->getProfiles();

echo "Profiles:\n";
/** @var \Webit\GlsAde\Model\Profile $profile */
foreach ($profiles as $profile) {
    echo sprintf("%d: %s\n", $profile->getId(), $profile->getDescription());
}
echo "\n";

$profile = $profileApi->changeProfile($profiles->first()->getId());
echo sprintf("Profile has been changed to \"%s\"\n", $profile->getId());
