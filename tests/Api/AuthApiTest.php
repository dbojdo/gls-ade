<?php

namespace Webit\GlsAde\Api;

class AuthApiTest extends AbstractApiTest
{
    /** @var AuthApi */
    private $authApi;

    protected function setUp()
    {
        $testEnv = $this->adeAccount()->isTestMode();
        $this->authApi = $this->apiFactory()->createAuthApi($testEnv);
    }

    /**
     * @test
     */
    public function shouldLogin()
    {
        $this->assertInternalType(
            'string',
            $this->authApi->login($this->adeAccount())
        );
    }

    /**
     * @test
     */
    public function shouldLogout()
    {
        $sessionId = $this->authApi->login($this->adeAccount());

        $this->assertEquals($sessionId, $this->authApi->logout($sessionId));
    }
}