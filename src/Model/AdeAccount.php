<?php

namespace Webit\GlsAde\Model;

class AdeAccount
{
    /** @var string */
    private $username;

    /** @var string */
    private $password;

    /** @var bool */
    private $testMode;

    /**
     * @param $username
     * @param $password
     * @param bool $testMode
     */
    public function __construct($username, $password, $testMode = false)
    {
        $this->username = $username;
        $this->password = $password;
        $this->testMode = $testMode;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return boolean
     */
    public function isTestMode()
    {
        return $this->testMode;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }


} 