# GLS ADE WebAPI Implementation

The repository provides a client to communicate with GLS SOAP APIs

## Installation

Add the **webit/gls-ade** into **composer.json**

```json
{
    "require": {
        "webit/gls-ade": "^2.0.0"
    }
}
```

## Usage

```php
use Webit\GlsAde\Model\AdeAccount;
use \Webit\GlsAde\Api\Factory\ApiFactory;

$adeAccount = new AdeAccount('your-login', 'your-password', 'is-test-env' ? true : false);

$apiFactory = ApiFactory::create();

/** @var \Webit\GlsAde\Api\AuthApi $authApi */
$authApi = $apiFactory->createAuthApi();

/** @var \Webit\GlsAde\Api\ConsignmentPrepareApi $consignemntPrepareApi */
$consignemntPrepareApi = $apiFactory->createConsignmentPrepareApi($adeAccount);

/** @var \Webit\GlsAde\Api\MpkApi $mpkApi */
$mpkApi = $apiFactory->createMpkApi($adeAccount);

/** @var \Webit\GlsAde\Api\PickupApi $pickupApi */
$pickupApi = $apiFactory->createPickupApi($adeAccount);

/** @var \Webit\GlsAde\Api\PostalCodeApi $postalCodeApi */
$postalCodeApi = $apiFactory->createPostalCodeApi($adeAccount);

/** @var \Webit\GlsAde\Api\ProfileApi $profileApi */
$profileApi = $apiFactory->createProfileApi($adeAccount);

/** @var \Webit\GlsAde\Api\SenderAddressApi $senderAddressApi */
$senderAddressApi = $apiFactory->createSenderAddressApi($adeAccount);

/** @var \Webit\GlsAde\Api\ServiceApi $serviceApi */
$serviceApi = $apiFactory->createServiceApi($adeAccount);
```

## Running examples

For real life example see **examples** directory.

```sh
cd examples
cp config.php.dist config.php
```

Set your account details in **config.php** then run examples

``sh
php auth.php
php mpk.php
php post-codes.php
php profile.php
php sender.php
php services.php
``

## Running tests

To run all tests (including real API calls tests), copy **phpunit.xml.dist** file to **phpunit.xml** and replace username / password.
If you don't do this, API tests will be skipped.

```sh
./vendor/bin/phpunit
```
