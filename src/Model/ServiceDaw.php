<?php
/**
 * File: ServiceDaw.php
 * Created at: 2014-11-21 20:57
 */
 
namespace Webit\GlsAde\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Class ServiceDaw
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/structures/s_srv_daw.htm
 *
 * Tablica zawiera dane usługi DAW.
 */
class ServiceDaw {

    /**
     * Imię i nazwisko
     * (Wymagany)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     * @JMS\Groups({"input"})
     *
     * @var string
     */
    private $name;

    /**
     * Budynek
     * (Opcja)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("building")
     * @JMS\Groups({"input"})
     *
     * @var string
     */
    private $building;

    /**
     * Piętro
     * (Opcja)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("floor")
     * @JMS\Groups({"input"})
     *
     * @var string
     */
    private $floor;

    /**
     * Pokój
     * (Opcja)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("room")
     * @JMS\Groups({"input"})
     *
     * @var string
     */
    private $room;

    /**
     * Telefon
     * (Opcja)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("phone")
     * @JMS\Groups({"input"})
     *
     * @var string
     */
    private $phone;

    /**
     * Odbiorca alternatywny
     * (Opcja)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("altrec")
     * @JMS\Groups({"input"})
     *
     * @var string
     */
    private $alternativeReceiver;

    /**
     * @return string
     */
    public function getAlternativeReceiver()
    {
        return $this->alternativeReceiver;
    }

    /**
     * @param string $alternativeReceiver
     */
    public function setAlternativeReceiver($alternativeReceiver)
    {
        $this->alternativeReceiver = $alternativeReceiver;
    }

    /**
     * @return string
     */
    public function getBuilding()
    {
        return $this->building;
    }

    /**
     * @param string $building
     */
    public function setBuilding($building)
    {
        $this->building = $building;
    }

    /**
     * @return string
     */
    public function getFloor()
    {
        return $this->floor;
    }

    /**
     * @param string $floor
     */
    public function setFloor($floor)
    {
        $this->floor = $floor;
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
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * @param string $room
     */
    public function setRoom($room)
    {
        $this->room = $room;
    }


}
 