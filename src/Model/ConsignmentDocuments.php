<?php
/**
 * ConsignmentDocuments.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created on Nov 24, 2014, 14:25
 */

namespace Webit\GlsAde\Model;

/**
 * Class ConsignmentDocuments
 * @package Webit\GlsAde\Model
 */
class ConsignmentDocuments
{
    /**
     * @var \SplFileInfo
     */
    private $labels;

    /**
     * @var \SplFileInfo
     */
    private $ident;

    public function __construct(\SplFileInfo $labels, \SplFileInfo $ident = null)
    {
        $this->labels = $labels;
        $this->ident = $ident;
    }

    /**
     * @return \SplFileInfo
     */
    public function getIdent()
    {
        return $this->ident;
    }

    /**
     * @return \SplFileInfo
     */
    public function getLabels()
    {
        return $this->labels;
    }
}
