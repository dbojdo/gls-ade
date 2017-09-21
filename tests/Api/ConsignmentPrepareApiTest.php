<?php

namespace Webit\GlsAde\Api;

use Webit\GlsAde\Model\Consignment;
use Webit\GlsAde\Model\Parcel;
use Webit\GlsAde\Model\SenderAddress;
use Webit\GlsAde\Model\ServicesBool;

class ConsignmentPrepareApiTest extends AbstractApiTest
{
    /**
     * @var ConsignmentPrepareApi
     */
    private $consignmentPrepareApi;

    protected function setUp()
    {
        $this->consignmentPrepareApi = $this->apiFactory()->createConsignmentPrepareApi($this->adeAccount());
    }

    /**
     * @test
     */
    public function shouldInsertConsignment()
    {
        $consignment = $this->consignment( 3);

        $consignmentId = $this->consignmentPrepareApi->insertConsignment($consignment);
        $this->assertNotEmpty($consignmentId);
    }

    /**
     * @test
     */
    public function shouldGetConsignmentsIds()
    {
        $id = $this->consignmentPrepareApi->insertConsignment($this->consignment(3));
        $ids = $this->consignmentPrepareApi->getConsignmentIds();
        $this->assertEquals($id, $ids->first());
    }

    /**
     * @test
     */
    public function shouldGetAllConsignmentsIds()
    {
        $id = $this->consignmentPrepareApi->insertConsignment($this->consignment(3));
        $ids = $this->consignmentPrepareApi->getAllConsignmentIds();
        $this->assertEquals($id, $ids->first());
    }

    /**
     * @test
     */
    public function shouldGetConsignment()
    {
        $id = $this->consignmentPrepareApi->insertConsignment($consignment = $this->consignment(3));
        $remoteConsignment = $this->consignmentPrepareApi->getConsignment($id);

        $this->assertEquals($id, $remoteConsignment->getId());
        $this->assertEquals($consignment->getParcels()->count(), $remoteConsignment->getParcels()->count());
    }

    /**
     * @test
     */
    public function shouldDeleteConsignment()
    {
        $id = $this->consignmentPrepareApi->insertConsignment($this->consignment(3));
        $this->assertEquals($id, $this->consignmentPrepareApi->deleteConsignment($id));
    }

    /**
     * @test
     */
    public function shouldGetLabels()
    {
        $id = $this->consignmentPrepareApi->insertConsignment($this->consignment());
        $labels = $this->consignmentPrepareApi->getConsignmentLabels($id);
        $this->assertInternalType('string', $labels);
    }

    /**
     * @test
     */
    public function shouldGetDocuments()
    {
        $id = $this->consignmentPrepareApi->insertConsignment($this->consignment());
        $labels = $this->consignmentPrepareApi->getConsignmentDocuments($id);
        $this->assertInstanceOf('Webit\GlsAde\Model\ConsignmentDocuments', $labels);

        $this->assertInternalType('string', $labels->getLabels());
    }
}