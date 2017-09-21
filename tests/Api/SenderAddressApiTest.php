<?php

namespace Webit\GlsAde\Api;

class SenderAddressApiTest extends AbstractApiTest
{
    /** @var SenderAddressApi */
    private $senderAddressApi;

    protected function setUp()
    {
        $this->senderAddressApi = $this->apiFactory()->createSenderAddressApi($this->adeAccount());
    }

    /**
     * @test
     */
    public function shouldGetStatus()
    {
        $status = $this->senderAddressApi->getSenderAddressStatus();
        $this->assertInternalType('integer', $status);
    }

    /**
     * @test
     */
    public function shouldGetDictionary()
    {
        $dictionary = $this->senderAddressApi->getSenderAddressDictionary();
        $this->assertInstanceOf('Doctrine\Common\Collections\ArrayCollection', $dictionary);
    }
}
