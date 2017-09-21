<?php

namespace Webit\GlsAde\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Class SenderAddress
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/structures/s_senderaddress.htm
 *
 * Tablica zawiera dane adresowe nadawcy.
 */
class SenderAddress {

    /**
     * Pierwsza część nazwy nadawcy
     * (Wymagany)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("name1")
     * @JMS\Groups({"input"})
     *
     * @var string
     */
    private $name1;

    /**
     * Druga część nazwy nadawcy
     * (Opcja)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("name2")
     * @JMS\Groups({"input"})
     *
     * @var string
     */
    private $name2;

    /**
     * Trzecia część nazwy nadawcy
     * (Opcja)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("name3")
     * @JMS\Groups({"input"})
     *
     * @var string
     */
    private $name3;

    /**
     * Kod kraju nadawcy (zgodny z ISO 3166-1 alfa-2)
     * (Wymagany)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("country")
     * @JMS\Groups({"input"})
     *
     * @var string
     */
    private $country;

    /**
     * Kod pocztowy nadawcy
     * (Wymagany)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("zipcode")
     * @JMS\Groups({"input"})
     *
     * @var string
     */
    private $zipCode;

    /**
     * Nazwa miejscowości nadawcy
     * (Wymagany)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("city")
     * @JMS\Groups({"input"})
     *
     * @var string
     */
    private $city;

    /**
     * Ulica nadawcy
     * (Wymagany)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("street")
     * @JMS\Groups({"input"})
     *
     * @var string
     */
    private $street;

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
    public function getName1()
    {
        return $this->name1;
    }

    /**
     * @param string $name1
     */
    public function setName1($name1)
    {
        $this->name1 = $name1;
    }

    /**
     * @return string
     */
    public function getName2()
    {
        return $this->name2;
    }

    /**
     * @param string $name2
     */
    public function setName2($name2)
    {
        $this->name2 = $name2;
    }

    /**
     * @return string
     */
    public function getName3()
    {
        return $this->name3;
    }

    /**
     * @param string $name3
     */
    public function setName3($name3)
    {
        $this->name3 = $name3;
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
 