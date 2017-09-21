<?php

namespace Webit\GlsAde\Api;

class ProfileApiTest extends AbstractApiTest
{
    /** @var ProfileApi */
    private $profileApi;

    protected function setUp()
    {
        $this->profileApi = $this->apiFactory()->createProfileApi($this->adeAccount());
    }

    /**
     * @test
     */
    public function shouldGetProfiles()
    {
       $profiles = $this->profileApi->getProfiles();
       $this->assertInstanceOf('Doctrine\Common\Collections\ArrayCollection', $profiles);
       $this->assertInstanceOf('Webit\GlsAde\Model\Profile', $profiles->first());
    }

    /**
     * @test
     */
    public function shouldChangeProfile()
    {
        $profiles = $this->profileApi->getProfiles();

        $profile = $this->profileApi->changeProfile($profiles->first()->getId());
        $this->assertEquals($profiles->first(), $profile);
    }
}
