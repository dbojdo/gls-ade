<?php

namespace Webit\GlsAde\Api;

class MpkApiTest extends AbstractApiTest
{
    /**
     * @var MpkApi
     */
    private $mpkApi;

    protected function setUp()
    {
        $this->mpkApi = $this->apiFactory()->createMpkApi($this->adeAccount());
    }

    /**
     * @test
     */
    public function shouldGetMpkStatus()
    {
        $this->assertEquals(1, $this->mpkApi->getMpkStatus());
    }

    /**
     * @test
     */
    public function shouldGetDictionary()
    {
        $this->assertEquals(1, $this->mpkApi->getMpkDictionary());
    }
}