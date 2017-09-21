<?php

namespace Webit\GlsAde\Api;

use Webit\GlsAde\Model\ConsignmentLabelModes;

class PickupApiTest extends AbstractApiTest
{
    /** @var ConsignmentPrepareApi */
    private $consignmentPrepareApi;

    /** @var PickupApi */
    private $pickupApi;

    protected function setUp()
    {
        $this->consignmentPrepareApi = $this->apiFactory()->createConsignmentPrepareApi($this->adeAccount());
        $this->pickupApi = $this->apiFactory()->createPickupApi($this->adeAccount());
    }

    /**
     * @test
     */
    public function shouldCreatePickup()
    {
        list($pickupId) = $this->newPickup();

        $this->assertInternalType('integer', $pickupId);
    }

    /**
     * @test
     */
    public function shouldGetPickupIds()
    {
        list($pickupId) = $this->newPickup();

        $remoteIds = $this->pickupApi->getPickupIds();
        $this->assertEquals($pickupId, $remoteIds->first());
    }

    /**
     * @test
     */
    public function shouldGetPickup()
    {
        list($pickupId, $pickupDescription) = $this->newPickup();

        $remotePickup = $this->pickupApi->getPickup($pickupId);
        $this->assertEquals($pickupDescription, $remotePickup->getDescription());
    }

    /**
     * @test
     */
    public function shouldGetConsignmentsIdsForPickup()
    {
        list($pickupId, , $ids) = $this->newPickup();

        $newIds = $this->pickupApi->getConsignmentIds($pickupId);

        $this->assertEquals(count($ids), count($newIds));
    }

    /**
     * @test
     */
    public function shouldGetAllConsignmentsIdsForPickup()
    {
        list($pickupId, , $ids) = $this->newPickup();

        $newIds = $this->pickupApi->getAllConsignmentIds($pickupId);

        $this->assertEquals(count($ids), count($newIds));
    }

    /**
     * @test
     */
    public function shouldGetPickupReceipt()
    {
        list($pickupId) = $this->newPickup();

        $this->assertInternalType('string', $this->pickupApi->getPickupReceipt($pickupId));
    }

    /**
     * @test
     */
    public function shouldGetPickupLabels()
    {
        list($pickupId) = $this->newPickup();

        $this->assertInternalType('string', $this->pickupApi->getPickupLabels($pickupId, ConsignmentLabelModes::MODE_FOUR_LABELS_ON_A4_PDF));
    }

    /**
     * @test
     */
    public function shouldGetConsignmentLabel()
    {
        list($pickupId) = $this->newPickup();

        $ids = $this->pickupApi->getConsignmentIds($pickupId);
        $labels = $this->pickupApi->getConsignmentLabels($ids->first(), ConsignmentLabelModes::MODE_FOUR_LABELS_ON_A4_PDF);

        $this->assertInternalType('string', $labels);
    }

    /**
     * @test
     */
    public function shouldGetIdentPrint()
    {
        list($pickupId) = $this->newPickup();

        $ident = $this->pickupApi->getIdentPrint($pickupId);
        $this->assertInternalType('string', $ident);
    }

    /**
     * @test
     */
    public function shouldSearchParcel()
    {
        list($pickupId) = $this->newPickup();
        $ids = $this->pickupApi->getConsignmentIds($pickupId);
        $consignment = $this->pickupApi->getConsignment($consignmentId = $ids->first());

        $parcel = $consignment->getParcels()->first();
        $foundConsignment = $this->pickupApi->searchParcel($parcelNo = $parcel->getNumber());

        $this->assertNotEmpty($foundConsignment);

        $parcel = $foundConsignment->getParcels()->first();
        $this->assertEquals(
            $parcelNo,
            $parcel->getNumber()
        );
    }

    /**
     * @return array
     */
    private function newPickup()
    {
        $ids = array();
        $ids[] = $this->consignmentPrepareApi->insertConsignment($this->consignment());
        $ids[] = $this->consignmentPrepareApi->insertConsignment($this->consignment());
        $ids[] = $this->consignmentPrepareApi->insertConsignment($this->consignment());

        return
            array(
                $this->pickupApi->createPickup($ids, $pickupDescription = $this->randomString()),
                $pickupDescription,
                $ids
            );
    }
}