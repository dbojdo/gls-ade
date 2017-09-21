<?php

namespace Webit\GlsAde\Api;

/**
 * Interface SessionAwareApiInterface
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
interface SessionAwareApiInterface 
{
    /**
     * @return string
     */
    public function getSessionId();
}
 