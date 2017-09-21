<?php

namespace Webit\GlsAde\Api;

class ServiceApiTest extends AbstractApiTest
{
    /** @var ServiceApi */
    private $serviceApi;

    protected function setUp()
    {
        $this->serviceApi = $this->apiFactory()->createServiceApi($this->adeAccount());
    }

    /**
     * @test
     */
    public function shouldGetMaxParcelWeight()
    {
        $this->assertInstanceOf(
            'Webit\GlsAde\Model\MaxParcelWeight',
            $this->serviceApi->getMaxParcelsWeight()
        );
    }

    /**
     * @test
     */
    public function shouldGetMaxCodAmount()
    {
        $this->assertInternalType(
            'double',
            $this->serviceApi->getMaxCodAmount()
        );
    }

    /**
     * @test
     */
    public function shouldGetAllowedServices()
    {
        $this->assertInstanceOf(
            'Webit\GlsAde\Model\ServiceList',
            $this->serviceApi->getAllowedServices()
        );
    }

    /**
     * @test
     */
    public function shouldGetGuaranteeServices()
    {
        $postCode = '30-313';
        $this->assertInstanceOf(
            'Webit\GlsAde\Model\ServiceList',
            $this->serviceApi->getGuaranteedServices($postCode)
        );
    }
}
