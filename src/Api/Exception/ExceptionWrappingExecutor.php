<?php

namespace Webit\GlsAde\Api\Exception;

use Webit\SoapApi\Executor\SoapApiExecutor;

class ExceptionWrappingExecutor implements SoapApiExecutor
{
    /** @var SoapApiExecutor */
    private $innerExecutor;

    /** @var ExceptionFactory */
    private $exceptionFactory;

    /**
     * ExceptionWrappingExecutor constructor.
     * @param SoapApiExecutor $innerExecutor
     * @param ExceptionFactory $exceptionFactory
     */
    public function __construct(SoapApiExecutor $innerExecutor, ExceptionFactory $exceptionFactory)
    {
        $this->innerExecutor = $innerExecutor;
        $this->exceptionFactory = $exceptionFactory;
    }

    /**
     * @inheritdoc
     */
    public function executeSoapFunction($soapFunction, $input = null)
    {
        try {
            return $this->innerExecutor->executeSoapFunction($soapFunction, $input);
        } catch (\Exception $e) {
            throw $this->exceptionFactory->createException($e, $soapFunction, $input);
        }
    }
}
