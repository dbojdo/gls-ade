<?php
/**
 * File: Consign.php
 * Created at: 2014-11-21 20:25
 */
 
namespace Webit\GlsAde\Model;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Consignment
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/structures/s_consign.htm
 *
 * Tablica transportuje dane na temat przesyłki oraz paczek.
 *
 * Szczególną uwagę należy zwrócić na właściwe wykorzystanie tej struktury dla usług PR, PS, EXC i SRS,
 * ponieważ zasadniczej zmianie ulega wykorzystanie elementów związanych z adresami (doręczenia, odbioru).
 * Uwagi na ten temat są podane w opisie tablicy ServicePPE.
 *
 * Sekcja z prefiksem r (od rname1 do rcontact) w przypadku usług PR, PS, EXC i SRS
 * nie musi być wypełniana (odpowiednie dane zostaną pobrane z tablicy ServicePPE).
 */
class Consignment {

    /**
     * Identyfikator przesyłki
     *
     * @var int
     */
    private $id;

    /**
     * Pierwsza część nazwy odbiorcy (tzw. Nazwa 1)
     * (Wymagany)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("rname1")
     * @JMS\Groups({"input"})
     *
     * @var string
     */
    private $name1;

    /**
     * Druga część nazwy odbiorcy (tzw. Nazwa 2)
     * (Opcja)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("rname2")
     * @JMS\Groups({"input"})
     *
     * @var string
     */
    private $name2;

    /**
     * Trzecia część nazwy odbiorcy (tzw. Nazwa 3)
     * (Opcja)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("rname3")
     * @JMS\Groups({"input"})
     *
     * @var string
     */
    private $name3;

    /**
     * Kod kraju odbiorcy (zgodny z ISO 3166-1 alfa-2)
     * (Wymagany)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("rcountry")
     * @JMS\Groups({"input"})
     *
     * @var string
     */
    private $country;

    /**
     * Kod pocztowy odbiorcy
     * (Wymagany)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("rzipcode")
     * @JMS\Groups({"input"})
     *
     * @var string
     */
    private $zipCode;

    /**
     * Nazwa miejscowości odbiorcy
     * (Wymagany)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("rcity")
     * @JMS\Groups({"input"})
     *
     * @var string
     */
    private $city;

    /**
     * Ulica odbiorcy
     * (Wymagany)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("rstreet")
     * @JMS\Groups({"input"})
     *
     * @var string
     */
    private $street;

    /**
     * Telefony do odbiorcy
     * (Opcja)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("rphone")
     * @JMS\Groups({"input"})
     *
     * @var string
     */
    private $phone;

    /**
     * Email, osoba kontaktowa odbiorcy
     * (string)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("rcontact")
     * @JMS\Groups({"input"})
     *
     * @var string
     */
    private $contact;

    /**
     * Referencje (pole to jest drukowane na etykietach, zazwyczaj podaje się
     * w tym polu skrócony opis zawartości paczki, nr zamównienia etc.)
     * (Opcja)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("references")
     * @JMS\Groups({"input"})
     *
     * @var string
     */
    private $references;

    /**
     * Uwagi
     * (Opcja)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("notes")
     * @JMS\Groups({"input"})
     *
     * @var string
     */
    private $notes;

    /**
     * Ilość paczek w przesyłce, zawartość pola jest automatycznie korygowana
     * na podstawie zawartości elementów tablicy z paczkami.
     * (Opcja)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("quantity")
     *
     * @var string
     */
    private $quantity;

    /**
     * Waga wszystkich paczek w przesyłce [kg], zawartość pola jest automatycznie korygowana
     * na podstawie zawartości elementów tablicy z paczkami.
     * (Opcja)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("weight")
     *
     * @var string
     */
    private $weight;

    /**
     * Data nadania, jeśli brak zostanie wstawiona aktualna data [YYYY-MM-DD]
     * (Opcja)
     *
     * @JMS\Type("DateTime<Y-m-d>")
     * @JMS\SerializedName("date")
     * @JMS\Groups({"input"})
     *
     * @var \DateTime
     */
    private $date;

    /**
     * Identyfikator MPK (patrz opis metody adePfc_GetStatus)
     * (Opcja)
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("pfc")
     * @JMS\Groups({"input"})
     *
     * @var string
     */
    private $pfc;

    /**
     * Adres nadawcy (patrz opis metody adeSendAddr_GetStatus)
     * (Opcja)
     *
     * @JMS\Type("Webit\GlsAde\Model\SenderAddress")
     * @JMS\SerializedName("sendaddr")
     * @JMS\Groups({"input"})
     *
     * @var SenderAddress
     */
    private $senderAddress;

    /**
     * Tablica z listą usług
     * (Opcja)
     *
     * @JMS\Type("Webit\GlsAde\Model\ServicesBool")
     * @JMS\SerializedName("srv_bool")
     * @JMS\Groups({"input"})
     *
     * @var ServicesBool
     */
    private $servicesBool;

    /**
     * Usługi zapisane w standardzie ADE. Zawartość elementu użyta na wejściu jest ignorowana.
     * Przykład zawartości: COD 120.00PLN,EXW,ROD,POD,12:00.
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("srv_ade")
     *
     * @var string
     */
    private $servicesAde;

    /**
     * Tablica z danymi usługi DAW
     * (Opcja)
     *
     *
     * @JMS\Type("Webit\GlsAde\Model\ServiceDaw")
     * @JMS\SerializedName("srv_daw")
     * @JMS\Groups({"input"})
     *
     * @var ServiceDaw
     */
    private $serviceDaw;

    /**
     * Tablica z danymi usługi IDENT
     * (Opcja)
     *
     *
     * @JMS\Type("Webit\GlsAde\Model\ServiceIdent")
     * @JMS\SerializedName("srv_ident")
     * @JMS\Groups({"input"})
     *
     * @var ServiceIdent
     */
    private $serviceIdent;

    /**
     * Tablica z danymi usług PR, PS, EXC i SRS
     * (Opcja)
     *
     * @JMS\Type("Webit\GlsAde\Model\ServicePpe")
     * @JMS\SerializedName("srv_ppe")
     * @JMS\Groups({"input"})
     *
     * @var ServicePpe
     */
    private $servicePpe;

    /**
     * Tablica z paczkami. W przypadku zastosowania struktury na wejściu, usługi podane
     * w poszczególnych paczkach są ignorowane i zastępowane przez usługi podane w elemencie srv_bool (nadrzędnym).
     * Opcja
     *
     *
     * @JMS\Type("ArrayCollection<Webit\GlsAde\Model\Parcel>")
     * @JMS\SerializedName("parcels")
     * @JMS\Groups({"input"})
     *
     * @var ArrayCollection
     */
    private $parcels;

    /**
     * Flag, if consignment has been fetched from "Prepare" or "Pickup"
     * @var bool
     */
    private $dispatched = false;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

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
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param string $contact
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
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
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
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
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @return ArrayCollection
     */
    public function getParcels()
    {
        if ($this->parcels == null) {
            $this->parcels = new ArrayCollection();
        }

        return $this->parcels;
    }

    /**
     * @param Parcel $parcel
     */
    public function addParcel(Parcel $parcel)
    {
        if (! $this->getParcels()->contains($parcel)) {
            $this->getParcels()->add($parcel);
        }
    }

    /**
     * @param Parcel $parcel
     */
    public function removeParcel(Parcel $parcel)
    {
        $this->getParcels()->removeElement($parcel);
    }

    /**
     * @return string
     */
    public function getPfc()
    {
        return $this->pfc;
    }

    /**
     * @param string $pfc
     */
    public function setPfc($pfc)
    {
        $this->pfc = $pfc;
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
    public function getQuantity()
    {
        return $this->quantity;
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
     * @return SenderAddress
     */
    public function getSenderAddress()
    {
        return $this->senderAddress;
    }

    /**
     * @param SenderAddress $senderAddress
     */
    public function setSenderAddress(SenderAddress $senderAddress)
    {
        $this->senderAddress = $senderAddress;
    }

    /**
     * @return ServiceDaw
     */
    public function getServiceDaw()
    {
        return $this->serviceDaw;
    }

    /**
     * @param ServiceDaw $serviceDaw
     */
    public function setServiceDaw(ServiceDaw $serviceDaw)
    {
        $this->serviceDaw = $serviceDaw;
    }

    /**
     * @return ServiceIdent
     */
    public function getServiceIdent()
    {
        return $this->serviceIdent;
    }

    /**
     * @param ServiceIdent $serviceIdent
     */
    public function setServiceIdent(ServiceIdent $serviceIdent)
    {
        $this->serviceIdent = $serviceIdent;
    }

    /**
     * @return ServicePpe
     */
    public function getServicePpe()
    {
        return $this->servicePpe;
    }

    /**
     * @param ServicePpe $servicePpe
     */
    public function setServicePpe(ServicePpe $servicePpe)
    {
        $this->servicePpe = $servicePpe;
    }

    /**
     * @return string
     */
    public function getServicesAde()
    {
        return $this->servicesAde;
    }

    /**
     * @return ServicesBool
     */
    public function getServicesBool()
    {
        return $this->servicesBool;
    }

    /**
     * @param ServicesBool $servicesBool
     */
    public function setServicesBool(ServicesBool $servicesBool)
    {
        $this->servicesBool = $servicesBool;
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
    public function getWeight()
    {
        return $this->weight;
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

    /**
     * @return bool
     */
    public function isDispatched()
    {
        return $this->dispatched;
    }

    public function setDispatched($dispatched)
    {
        $this->dispatched = (bool) $dispatched;
    }
}
 