<?php
/**
 * File: AbstractSessionAwareApi.php
 * Created at: 2014-11-24 05:34
 */
 
namespace Webit\GlsAde\Api;

/**
 * Class AbstractSessionAwareApi
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
abstract class AbstractSessionAwareApi extends AbstractApi implements SessionAwareApiInterface
{
    /**
     * @var AuthApi
     */
    private $authApi;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $sessionId;

    public function __construct(\SoapClient $client, $authApi, $username, $password)
    {
        parent::__construct($client);

        $this->authApi = $authApi;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getSessionId()
    {
        if (! $this->sessionId) {
            $this->sessionId = $this->authApi->login($this->username, $this->password);
        }

        return $this->sessionId;
    }

    /**
     * @return string
     */
    private function renewSessionId()
    {
        $this->sessionId = null;
        return $this->getSessionId();
    }

    /**
     * @param string $soapFunction
     * @param array $arguments
     * @return mixed
     */
    protected function request($soapFunction, $arguments = array())
    {
        $arguments = array_replace(array('session' => $this->getSessionId()), $arguments);

        try {
            return parent::request($soapFunction, $arguments);
        } catch (\Exception $e) {
            // err_sess_expired || //err_sess_not_found

            $arguments['session'] = $this->renewSessionId();
            return parent::request($soapFunction, $arguments);
        }
    }
}
