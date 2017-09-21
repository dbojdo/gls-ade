<?php

namespace Webit\GlsAde\Model;

use JMS\Serializer\Annotation as JMS;
use Traversable;

/**
 * Class ServicesBool
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/structures/s_services_bool.htm
 *
 * Tablica zawiera usługi (serwisy) dla przesyłek/paczek. Wartość pola 1 oznacza aktywność usługi.
 * W przypadku użycia struktury na wejściu, nie ma koniecznośći nadawania wartości wszystkim elementom tablicy.
 * Opis użytych skrótów znajduje się w rozdziale Usługi zapisane w standardzie ADE.
 */
class ServicesBool implements \IteratorAggregate {

    /**
     * COD (Cash-Service) - Pobranie za towar
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("cod")
     * @JMS\Groups({"input"})
     *
     * @var int
     */
    private $cod;

    /**
     * Kwota COD
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("cod_amount")
     * @JMS\Groups({"input"})
     *
     * @var int
     */
    private $codAmount;

    /**
     * (ExWorks-Service) - Płaci odbiorca
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("exw")
     * @JMS\Groups({"input"})
     *
     * @var int
     */
    private $exw;

    /**
     * (DocumentReturn-Servic) - Zwrot dokumentów
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("rod")
     * @JMS\Groups({"input"})
     *
     * @var int
     */
    private $rod;

    /**
     * (ProofOfDelivery-Service) - Potwierdzenie dostawy)
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("pod")
     * @JMS\Groups({"input"})
     *
     * @var int
     */
    private $pod;

    /**
     * (Exchange-Service) - Wymiana towaru
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("exc")
     * @JMS\Groups({"input"})
     *
     * @var int
     */
    private $exc;

    /**
     * (Ident-Service) - Zwrot podpisanej umowy, po uprzedniej identyfikacji odbiorcy przez kuriera
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("ident")
     * @JMS\Groups({"input"})
     *
     * @var int
     */
    private $ident;

    /**
     * (DeliveryAtWork-Service) - Doręczenie paczki do rąk własnych odbiorcy lub zdefiniowanego miejsca w firmie
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("daw")
     * @JMS\Groups({"input"})
     *
     * @var int
     */
    private $daw;

    /**
     * (Pick&Ship-Service) - Odbiór paczki spod dowolnego adresu i dostarczenie jej do odbiorcy
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("ps")
     * @JMS\Groups({"input"})
     *
     * @var int
     */
    private $ps;

    /**
     * (Pick&Return-Service) - Odbiór paczki spod dowolnego adresu i dostarczenie jej do firmy/osoby zlecającej usługę
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("pr")
     * @JMS\Groups({"input"})
     *
     * @var int
     */
    private $pr;

    /**
     * (10:00-Service) - Dostawa do godziny 10:00
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("s10")
     * @JMS\Groups({"input"})
     *
     * @var int
     */
    private $s10;

    /**
     * (12:00-Service) - Dostawa do godziny 12:00
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("s12")
     * @JMS\Groups({"input"})
     *
     * @var int
     */
    private $s12;

    /**
     * (Saturday-Service) - Dostawa w sobotę
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("sat")
     * @JMS\Groups({"input"})
     *
     * @var int
     */
    private $sat;

    /**
     * (Odbiór własny) - Odbiór paczki w filii GLS Poland
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("ow")
     * @JMS\Groups({"input"})
     *
     * @var int
     */
    private $ow;

    /**
     * (ShopReturn-Service) - Zwrot paczki w dowolnym punkcie ParcelShop
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("srs")
     * @JMS\Groups({"input"})
     *
     * @var int
     */
    private $srs;

    /**
     * @return int
     */
    public function getCod()
    {
        return $this->cod;
    }

    /**
     * @param int $cod
     */
    public function setCod($cod)
    {
        $this->cod = $cod;
    }

    /**
     * @return int
     */
    public function getCodAmount()
    {
        return $this->codAmount;
    }

    /**
     * @param int $codAmount
     */
    public function setCodAmount($codAmount)
    {
        $this->codAmount = $codAmount;
    }

    /**
     * @return int
     */
    public function getDaw()
    {
        return $this->daw;
    }

    /**
     * @param int $daw
     */
    public function setDaw($daw)
    {
        $this->daw = $daw;
    }

    /**
     * @return int
     */
    public function getExc()
    {
        return $this->exc;
    }

    /**
     * @param int $exc
     */
    public function setExc($exc)
    {
        $this->exc = $exc;
    }

    /**
     * @return int
     */
    public function getExw()
    {
        return $this->exw;
    }

    /**
     * @param int $exw
     */
    public function setExw($exw)
    {
        $this->exw = $exw;
    }

    /**
     * @return int
     */
    public function getIdent()
    {
        return $this->ident;
    }

    /**
     * @param int $ident
     */
    public function setIdent($ident)
    {
        $this->ident = $ident;
    }

    /**
     * @return int
     */
    public function getOw()
    {
        return $this->ow;
    }

    /**
     * @param int $ow
     */
    public function setOw($ow)
    {
        $this->ow = $ow;
    }

    /**
     * @return int
     */
    public function getPod()
    {
        return $this->pod;
    }

    /**
     * @param int $pod
     */
    public function setPod($pod)
    {
        $this->pod = $pod;
    }

    /**
     * @return int
     */
    public function getPr()
    {
        return $this->pr;
    }

    /**
     * @param int $pr
     */
    public function setPr($pr)
    {
        $this->pr = $pr;
    }

    /**
     * @return int
     */
    public function getPs()
    {
        return $this->ps;
    }

    /**
     * @param int $ps
     */
    public function setPs($ps)
    {
        $this->ps = $ps;
    }

    /**
     * @return int
     */
    public function getRod()
    {
        return $this->rod;
    }

    /**
     * @param int $rod
     */
    public function setRod($rod)
    {
        $this->rod = $rod;
    }

    /**
     * @return int
     */
    public function getS10()
    {
        return $this->s10;
    }

    /**
     * @param int $s10
     */
    public function setS10($s10)
    {
        $this->s10 = $s10;
    }

    /**
     * @return int
     */
    public function getS12()
    {
        return $this->s12;
    }

    /**
     * @param int $s12
     */
    public function setS12($s12)
    {
        $this->s12 = $s12;
    }

    /**
     * @return int
     */
    public function getSat()
    {
        return $this->sat;
    }

    /**
     * @param int $sat
     */
    public function setSat($sat)
    {
        $this->sat = $sat;
    }

    /**
     * @return int
     */
    public function getSrs()
    {
        return $this->srs;
    }

    /**
     * @param int $srs
     */
    public function setSrs($srs)
    {
        $this->srs = $srs;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Retrieve an external iterator
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     */
    public function getIterator()
    {
        return new \ArrayIterator(array(
            'cod' => $this->getCod(),
            'cod_amount' => $this->getCodAmount(),
            'exw' => $this->getExw(),
            'rod' => $this->getRod(),
            'pod' => $this->getPod(),
            'exc' => $this->getExc(),
            'ident' => $this->getIdent(),
            'daw' => $this->getDaw(),
            'ps' => $this->getPs(),
            'pr' => $this->getPr(),
            's10' => $this->getS10(),
            's12' => $this->getS12(),
            'sat' => $this->getSat(),
            'ow' => $this->getOw(),
            'srs' => $this->getSrs()
        ));
    }
}
