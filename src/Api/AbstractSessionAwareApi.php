<?php
/**
 * File: AbstractSessionAwareApi.php
 * Created at: 2014-11-24 05:34
 */
 
namespace Webit\GlsAde\Api;

use Webit\GlsAde\Model\AdeAccount;
use Webit\SoapApi\SoapApiExecutorInterface;

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
    private $account;

    /**
     * @var string
     */
    private $sessionId;

    /**
     * @param SoapApiExecutorInterface $executor
     * @param AuthApi $authApi
     * @param AdeAccount $account
     */
    public function __construct(
        SoapApiExecutorInterface $executor,
        AuthApi $authApi,
        AdeAccount $account
    ) {
        parent::__construct($executor);

        $this->authApi = $authApi;
        $this->account = $account;
    }

    /**
     * @return string
     */
    public function getSessionId()
    {
        if (! $this->sessionId) {
            $this->sessionId = $this->authApi->login($this->account);
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
     * @param mixed $arguments
     * @param string $resultType
     * @return mixed
     */
    protected function request($soapFunction, $arguments = null, $resultType = 'ArrayCollection')
    {
        $arguments = array_replace(array('session' => $this->getSessionId()), (array) $arguments);

        try {
            return parent::request($soapFunction, $arguments, $resultType);
        } catch (\Exception $e) {
            // err_sess_expired || //err_sess_not_found

            $arguments['session'] = $this->renewSessionId();
            return parent::request($soapFunction, $arguments, $resultType);
        }
    }
}
