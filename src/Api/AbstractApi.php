<?php

namespace Webit\GlsAde\Api;

use Webit\SoapApi\Executor\SoapApiExecutor;

/**
 * Class AbstractApi
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
abstract class AbstractApi
{
    /** @var SoapApiExecutor */
    private $executor;

    /**
     * @param SoapApiExecutor $executor
     */
    public function __construct(SoapApiExecutor $executor)
    {
        $this->executor = $executor;
    }

    /**
     * @param string $soapFunction
     * @param mixed $arguments
     * @return mixed
     */
    protected function request($soapFunction, $arguments = null)
    {
        return $this->executor->executeSoapFunction($soapFunction, $arguments);
    }
}
