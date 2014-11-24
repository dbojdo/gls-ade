<?php
/**
 * File: SessionAwareApiInterface.php
 * Created at: 2014-11-24 05:32
 */
 
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
 