<?php

namespace Webit\GlsAde\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Pickup
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/structures/s_pickup.htm
 *
 * Tablica zawiera informacje z danymi pojedynczego potwierdzenia nadania (pickup'u).
 */
class Pickup {

    /**
     * Opis potwierdzenia
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("desc")
     *
     * @var string
     */
    private $description;

    /**
     * Ilość paczek w pickup'ie
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("quantity")
     *
     * @var int
     */
    private $quantity;

    /**
     * Łączna waga paczek w pickup'ie [kg]
     * @JMS\Type("string")
     * @JMS\SerializedName("weight")
     *
     * @var string
     */
    private $weight;

    /**
     * Data i czas utworzenia pickup'u (YYYY-MM-DD hh:mm:ss, np. 2012-04-16 14:25:02)
     *
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     * @JMS\SerializedName("datetime")
     *
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }
}
