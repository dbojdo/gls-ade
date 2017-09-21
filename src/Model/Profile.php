<?php

namespace Webit\GlsAde\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Profile
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/structures/s_profile.htm
 *
 * Tablica zawiera dane pojedynczego profilu.
 */
class Profile {

    /**
     * Identyfikator profilu.
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("id")
     *
     * @var int
     */
    private $id;

    /**
     * Opis profilu (zawiera poziom uprawnień: Administratorzy, Filie, Firmy oraz nazwe filli lub firmy).
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("desc")
     *
     * @var string
     */
    private $description;

    /**
     * @return int
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
}
 