<?php

namespace Webit\GlsAde\Model;

class ConsignmentDocuments
{
    /** @var string */
    private $labels;

    /** @var string */
    private $ident;

    public function __construct($labels, $ident = null)
    {
        $this->labels = $labels;
        $this->ident = $ident;
    }

    /**
     * @return string
     */
    public function getIdent()
    {
        return $this->ident;
    }

    /**
     * @return string
     */
    public function getLabels()
    {
        return $this->labels;
    }
}
