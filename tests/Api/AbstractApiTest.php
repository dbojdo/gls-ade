<?php

namespace Webit\GlsAde\Api;

use Webit\GlsAde\AbstractTest;
use Webit\GlsAde\Api\Factory\ApiFactory;
use Webit\GlsAde\Model\AdeAccount;
use Webit\GlsAde\Model\Consignment;
use Webit\GlsAde\Model\Parcel;
use Webit\GlsAde\Model\SenderAddress;
use Webit\GlsAde\Model\ServicesBool;

abstract class AbstractApiTest extends AbstractTest
{
    /**
     * @var ApiFactory
     */
    private $apiFactory;

    /**
     * @return ApiFactory
     */
    protected function apiFactory()
    {
        if (!$this->apiFactory) {
            $this->apiFactory = new ApiFactory();
        }

        return $this->apiFactory;
    }

    /**
     * @return AdeAccount
     */
    protected function adeAccount()
    {
        $username = getenv('gls.username');
        $password = getenv('gls.password');
        $isTestEnv = getenv('gls.env') != 'prod';

        if (in_array('changeme', array($username, $password))) {
            $this->markTestSkipped('gls.username or / and gls.password env variables must be set to.');
        }

        return new AdeAccount($username, $password, $isTestEnv);
    }

    /**
     * @param int $maxParcels
     * @return Consignment
     */
    protected function consignment($maxParcels = 3)
    {
        $parcelsNo = mt_rand(1, $maxParcels);

        $consignment = new Consignment();

        $consignment->setContact($this->faker()->name);
        $consignment->setCountry('PL');
        $consignment->setName1($this->faker()->firstName);
        $consignment->setName2($this->faker()->lastName);
        $consignment->setPhone($this->faker()->phoneNumber);
        $consignment->setReferences($this->faker()->colorName);
        $consignment->setStreet($this->faker()->streetAddress);
        $consignment->setZipCode('30-313');
        $consignment->setCity('Kraków');

        $sender = new SenderAddress();
        $sender->setZipCode('30-313');
        $sender->setStreet($this->faker()->streetAddress);
        $sender->setCity('Kraków');
        $sender->setCountry('PL');
        $sender->setName1($this->faker()->company);

        $consignment->setSenderAddress($sender);

        $services = new ServicesBool();

        if ($cod = $this->randomBoolean()) {
            $services->setCod(1);
            $services->setCodAmount($this->randomInt(10000, 250000) / 100);
        }

        $consignment->setServicesBool($services);

        for ($i = 0; $i < $parcelsNo; $i++) {
            $parcel = $this->parcel($services);
            $consignment->addParcel($parcel);
        }

        return $consignment;
    }

    /**
     * @param ServicesBool $services
     * @return Parcel
     */
    private function parcel(ServicesBool $services)
    {
        $parcel = new Parcel();
        $parcel->setReference($this->faker()->colorName);
        $parcel->setWeight($this->randomInt(10, 300)/10);
        $parcel->setServicesBool($services);

        return $parcel;
    }
}