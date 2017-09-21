<?php

namespace Webit\GlsAde\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Class ServicePpe
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>

 * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/structures/s_srv_ppe.htm
 *
 * Tablica zawiera dane usług PR, PS, EXC i SRS. Usługi te wzajemnie się wykluczają
 * (tzn. nie można nadać przesyłki z usługą PR i jednocześnie PS lub EXC lub SRS).
 * Korzystając ze struktury na wyjściu (np. jako wynik działania metody adePickup_GetConsign)
 * należy pamiętać o odczycie danych Consign.srv_bool (typ ServicesBool).
 * Dane tam zawarte pozwolą stwierdzić, której z usług (PR, PS, EXC, SRS) dotyczą pobrane dane.
 * Wypełniając natomiast strukturę na wejściu (np. dla metody adePreparingBox_Insert),
 * należy również zwrócić uwagę na właściwe wypełnienie Consign.srv_bool (typ ServicesBool)
 * oraz samej struktury ServicePPE. Sekcja z prefiksem s: PR, PS - dane miejsce odbioru przesyłki,
 * EXC - dane nadawcy Exchange-Service, SRS - dane odsyłającego towar.
 *
 * Sekcja z prefiksem r: PR - dane miejsca doręczenia (na wejściu dane sa ignorowane - wypełnia je system),
 * PS - dane miejsca doręczenia, EXC - dane odbiorcy Exchange-Service, SRS - dane odbiorcy ShopReturn-Service.
 *
 * Sekcja wspólna: PR - dane na wejściu są ignorowane
 */
class ServicePpe {

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("references")
     * @JMS\Groups({"input", "output"})
     *
     * @var string
     */
    private $references;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("weight")
     * @JMS\Groups({"input", "output"})
     *
     * @var string
     */
    private $weight;

    /**
     * Pierwsza część nazwy (tzw. Nazwa 1)
     * (Wymagany)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("sname1")
     * @JMS\Groups({"input", "output"})
     *
     * @var string
     */
    private $sName1;

    /**
     * Druga część nazwy (tzw. Nazwa 2)
     * (Opcja)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("sname2")
     * @JMS\Groups({"input", "output"})
     *
     * @var string
     */
    private $sName2;

    /**
     * Trzecia część nazwy (tzw. Nazwa 3)
     * (Opcja)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("sname3")
     * @JMS\Groups({"input", "output"})
     *
     * @var string
     */
    private $sName3;

    /**
     * Kod kraju (zgodny z ISO 3166-1 alfa-2)
     * (Wymagany)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("scountry")
     * @JMS\Groups({"input", "output"})
     *
     * @var string
     */
    private $sCountry;

    /**
     * Kod pocztowy
     * (Wymagany)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("szipcode")
     * @JMS\Groups({"input", "output"})
     *
     * @var string
     */
    private $sZipCode;

    /**
     * Nazwa miejscowości
     * (Wymagany)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("scity")
     * @JMS\Groups({"input", "output"})
     *
     * @var string
     */
    private $sCity;

    /**
     * Ulica
     * (Wymagany)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("sstreet")
     * @JMS\Groups({"input", "output"})
     *
     * @var string
     */
    private $sStreet;

    /**
     * Telefony
     * (Opcja)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("sphone")
     * @JMS\Groups({"input", "output"})
     *
     * @var string
     */
    private $sPhone;

    /**
     * Email, osoba kontaktowa
     * (Opcja)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("scontact")
     * @JMS\Groups({"input", "output"})
     *
     * @var string
     */
    private $sContact;

    /**
     * Pierwsza część nazwy (tzw. Nazwa 1)
     * (Wymagany)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("rname1")
     * @JMS\Groups({"input", "output"})
     *
     * @var string
     */
    private $rName1;

    /**
     * Druga część nazwy (tzw. Nazwa 2)
     * (Opcja)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("rname2")
     * @JMS\Groups({"input", "output"})
     *
     * @var string
     */
    private $rName2;

    /**
     * Trzecia część nazwy (tzw. Nazwa 3)
     * (Opcja)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("rname3")
     * @JMS\Groups({"input", "output"})
     *
     * @var string
     */
    private $rName3;

    /**
     * Kod kraju (zgodny z ISO 3166-1 alfa-2)
     * (Wymagany)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("rcountry")
     * @JMS\Groups({"input", "output"})
     *
     * @var string
     */
    private $rCountry;

    /**
     * Kod pocztowy
     * (Wymagany)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("rzipcode")
     * @JMS\Groups({"input", "output"})
     *
     * @var string
     */
    private $rZipCode;

    /**
     * Nazwa miejscowości
     * (Wymagany)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("rcity")
     * @JMS\Groups({"input", "output"})
     *
     * @var string
     */
    private $rCity;

    /**
     * Ulica
     * (Wymagany)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("rstreet")
     * @JMS\Groups({"input", "output"})
     *
     * @var string
     */
    private $rStreet;

    /**
     * Telefony
     * (Opcja)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("rphone")
     * @JMS\Groups({"input", "output"})
     *
     * @var string
     */
    private $rPhone;

    /**
     * Email, osoba kontaktowa
     * (Opcja)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("rcontact")
     * @JMS\Groups({"input", "output"})
     *
     * @var string
     */
    private $rContact;

    /**
     * @return string
     */
    public function getRCity()
    {
        return $this->rCity;
    }

    /**
     * @param string $rCity
     */
    public function setRCity($rCity)
    {
        $this->rCity = $rCity;
    }

    /**
     * @return string
     */
    public function getRContact()
    {
        return $this->rContact;
    }

    /**
     * @param string $rContact
     */
    public function setRContact($rContact)
    {
        $this->rContact = $rContact;
    }

    /**
     * @return string
     */
    public function getRCountry()
    {
        return $this->rCountry;
    }

    /**
     * @param string $rCountry
     */
    public function setRCountry($rCountry)
    {
        $this->rCountry = $rCountry;
    }

    /**
     * @return string
     */
    public function getRName1()
    {
        return $this->rName1;
    }

    /**
     * @param string $rName1
     */
    public function setRName1($rName1)
    {
        $this->rName1 = $rName1;
    }

    /**
     * @return string
     */
    public function getRName2()
    {
        return $this->rName2;
    }

    /**
     * @param string $rName2
     */
    public function setRName2($rName2)
    {
        $this->rName2 = $rName2;
    }

    /**
     * @return string
     */
    public function getRName3()
    {
        return $this->rName3;
    }

    /**
     * @param string $rName3
     */
    public function setRName3($rName3)
    {
        $this->rName3 = $rName3;
    }

    /**
     * @return string
     */
    public function getRPhone()
    {
        return $this->rPhone;
    }

    /**
     * @param string $rPhone
     */
    public function setRPhone($rPhone)
    {
        $this->rPhone = $rPhone;
    }

    /**
     * @return string
     */
    public function getRStreet()
    {
        return $this->rStreet;
    }

    /**
     * @param string $rStreet
     */
    public function setRStreet($rStreet)
    {
        $this->rStreet = $rStreet;
    }

    /**
     * @return string
     */
    public function getRZipCode()
    {
        return $this->rZipCode;
    }

    /**
     * @param string $rZipCode
     */
    public function setRZipCode($rZipCode)
    {
        $this->rZipCode = $rZipCode;
    }

    /**
     * @return string
     */
    public function getReferences()
    {
        return $this->references;
    }

    /**
     * @param string $references
     */
    public function setReferences($references)
    {
        $this->references = $references;
    }

    /**
     * @return string
     */
    public function getSCity()
    {
        return $this->sCity;
    }

    /**
     * @param string $sCity
     */
    public function setSCity($sCity)
    {
        $this->sCity = $sCity;
    }

    /**
     * @return string
     */
    public function getSContact()
    {
        return $this->sContact;
    }

    /**
     * @param string $sContact
     */
    public function setSContact($sContact)
    {
        $this->sContact = $sContact;
    }

    /**
     * @return string
     */
    public function getSCountry()
    {
        return $this->sCountry;
    }

    /**
     * @param string $sCountry
     */
    public function setSCountry($sCountry)
    {
        $this->sCountry = $sCountry;
    }

    /**
     * @return string
     */
    public function getSName1()
    {
        return $this->sName1;
    }

    /**
     * @param string $sName1
     */
    public function setSName1($sName1)
    {
        $this->sName1 = $sName1;
    }

    /**
     * @return string
     */
    public function getSName2()
    {
        return $this->sName2;
    }

    /**
     * @param string $sName2
     */
    public function setSName2($sName2)
    {
        $this->sName2 = $sName2;
    }

    /**
     * @return string
     */
    public function getSName3()
    {
        return $this->sName3;
    }

    /**
     * @param string $sName3
     */
    public function setSName3($sName3)
    {
        $this->sName3 = $sName3;
    }

    /**
     * @return string
     */
    public function getSPhone()
    {
        return $this->sPhone;
    }

    /**
     * @param string $sPhone
     */
    public function setSPhone($sPhone)
    {
        $this->sPhone = $sPhone;
    }

    /**
     * @return string
     */
    public function getSStreet()
    {
        return $this->sStreet;
    }

    /**
     * @param string $sStreet
     */
    public function setSStreet($sStreet)
    {
        $this->sStreet = $sStreet;
    }

    /**
     * @return string
     */
    public function getSZipCode()
    {
        return $this->sZipCode;
    }

    /**
     * @param string $sZipCode
     */
    public function setSZipCode($sZipCode)
    {
        $this->sZipCode = $sZipCode;
    }

    /**
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param string $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }


}
