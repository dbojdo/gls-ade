<?php

namespace Webit\GlsAde\Api;

class PostCodeApiTest extends AbstractApiTest
{
    /** @var PostCodeApi */
    private $postCodeApi;

    protected function setUp()
    {
        $this->postCodeApi = $this->apiFactory()->createPostCodeApi($this->adeAccount());
    }

    /**
     * @test
     */
    public function shouldGetCity()
    {
        $code = '30-313';
        $country = 'PL';

        $this->assertEquals('KRAKOW', $this->postCodeApi->getCity($country, $code));
    }
}