<?php
/**
 * File: ServiceIdent.php
 * Created at: 2014-11-21 20:56
 */
 
namespace Webit\GlsAde\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Class ServiceIdent
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/structures/s_srv_ident.htm
 *
 * Tablica zawiera dane usługi IDENT.
 */
class ServiceIdent {

    /**
     * Imię i nazwisko
     * (Wymagany)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     * @JMS\Groups({"input", "output"})
     *
     * @var string
     */
    private $name;

    /**
     * Kod kraju (zgodny z ISO 3166-1 alfa-2)
     * (Wymagany)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("country")
     * @JMS\Groups({"input", "output"})
     *
     * @var string
     */
    private $country;

    /**
     * Kod pocztowy
     * (Wymagany)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("zipcode")
     * @JMS\Groups({"input", "output"})
     *
     * @var string
     */
    private $zipCode;

    /**
     * Miejscowość
     * (Wymagany)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("city")
     * @JMS\Groups({"input", "output"})
     *
     * @var string
     */
    private $city;

    /**
     * Ulica
     * (Wymagany)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("street")
     * @JMS\Groups({"input", "output"})
     *
     * @var string
     */
    private $street;

    /**
     * Data urodzenia [YYYY-MM-DD]
     * (Opcja)
     *
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\SerializedName("date_birth")
     * @JMS\Groups({"input", "output"})
     *
     * @var string
     */
    private $dateBirth;

    /**
     * Numer dowodu potwierdzającego tożsamość
     * (Opcja)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("identity")
     * @JMS\Groups({"input", "output"})
     *
     * @var string
     */
    private $identity;

    /**
     * Typ dokumentu potwierdzającego tożsamość (1-dowód osobisty, 2-paszport, 3-prawo jazdy, 9-inny dokument)
     * (Opcja)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("ident_doctype")
     * @JMS\Groups({"input", "output"})
     *
     * @var string
     */
    private $identityDocumentType;

    /**
     * Obywatelstwo
     * (Opcja)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("nation")
     * @JMS\Groups({"input", "output"})
     *
     * @var string
     */
    private $nationality;



    /**
     * Liczba wszystkich dokumentów
     * (Opcja)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("spages")
     * @JMS\Groups({"input", "output"})
     *
     * @var string
     */
    private $pagesNo;

    /**
     * Łączna liczba podpisów
     * (Opcja)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("ssign")
     * @JMS\Groups({"input", "output"})
     *
     * @var string
     */
    private $signsNo;

    /**
     * Liczba kopii umowy nadawcy
     * (Opcja)
     * @JMS\Type("string")
     * @JMS\SerializedName("sdealsend")
     * @JMS\Groups({"input", "output"})
     *
     * @var string
     */
    private $dealSendNo;

    /**
     * Liczba kopii umowy dla odbiorcy
     * (Opcja)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("sdealrec")
     * @JMS\Groups({"input", "output"})
     *
     * @var string
     */
    private $dealRecNo;

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getDateBirth()
    {
        return $this->dateBirth;
    }

    /**
     * @param string $dateBirth
     */
    public function setDateBirth($dateBirth)
    {
        $this->dateBirth = $dateBirth;
    }

    /**
     * @return string
     */
    public function getDealRecNo()
    {
        return $this->dealRecNo;
    }

    /**
     * @param string $dealRecNo
     */
    public function setDealRecNo($dealRecNo)
    {
        $this->dealRecNo = $dealRecNo;
    }

    /**
     * @return string
     */
    public function getDealSendNo()
    {
        return $this->dealSendNo;
    }

    /**
     * @param string $dealSendNo
     */
    public function setDealSendNo($dealSendNo)
    {
        $this->dealSendNo = $dealSendNo;
    }

    /**
     * @return string
     */
    public function getIdentity()
    {
        return $this->identity;
    }

    /**
     * @param string $identity
     */
    public function setIdentity($identity)
    {
        $this->identity = $identity;
    }

    /**
     * @return string
     */
    public function getIdentityDocumentType()
    {
        return $this->identityDocumentType;
    }

    /**
     * @param string $identityDocumentType
     */
    public function setIdentityDocumentType($identityDocumentType)
    {
        $this->identityDocumentType = $identityDocumentType;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * @param string $nationality
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;
    }

    /**
     * @return string
     */
    public function getPagesNo()
    {
        return $this->pagesNo;
    }

    /**
     * @param string $pagesNo
     */
    public function setPagesNo($pagesNo)
    {
        $this->pagesNo = $pagesNo;
    }

    /**
     * @return string
     */
    public function getSignsNo()
    {
        return $this->signsNo;
    }

    /**
     * @param string $signsNo
     */
    public function setSignsNo($signsNo)
    {
        $this->signsNo = $signsNo;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param string $zipCode
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
    }
}
