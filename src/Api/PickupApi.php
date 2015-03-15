<?php
/**
 * File: PickupApi.php
 * Created at: 2014-11-24 06:28
 */
 
namespace Webit\GlsAde\Api;

use Doctrine\Common\Collections\ArrayCollection;
use Webit\GlsAde\Model\Consignment;
use Webit\GlsAde\Model\ConsignmentLabelModes;
use Webit\GlsAde\Model\Pickup;
use Webit\GlsAde\Model\PickupReceiptModes;

/**
 * Class PickupApi
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/function_list.htm
 * Potwierdzenia nadania
 */
class PickupApi extends AbstractSessionAwareApi
{
    /**
     * Metoda pozwala na stworzenie potwierdzenia nadania z wybranych z przygotowalni przesyłek.
     * Paczki bez numerów otrzymują je automatycznie. Przesyłki, które znalazły się w nowo utworzonym potwierdzeniu
     * nadania otrzymują nowe identyfikatory (czyli są one różne od tych z przygotowalni).
     * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/functions/f_pickup_create.htm
     *
     * @param array $consignmentIds
     * @param string $description
     * @return int
     */
    public function createPickup(array $consignmentIds, $description)
    {
        $response = $this->request(
            'adePickup_Create',
            array('consigns_ids' => $consignmentIds, 'desc' => $description)
        );

        return $response->get('id');
    }

    /**
     * Metoda pozwala uzyskać identyfikatory potwierdzeń nadania.
     * Zwracanych jest nie więcej niż 100 identyfikatorów uporządkowanych malejąco.
     *
     * Pierwsze wywołanie funkcji powinno się odbyć z parametrem id_start = 0. Zostanie wtedy zwróconych
     * nie więcej niż 100 identyfikatorów uporządkowanych malejąco (tym samym pierwsze wywołanie funkcji daje
     * zawsze najnowsze identyfikatory) mniejszych niż id_start. Jeśli zwróconych zostanie mniej niż
     * 100 identyfikatorów, oznacza to że zostały pobrane wszystkie. Natomiast jeśli zostanie zwróconych
     * 100 identyfikatorów, należy wywołać funkcję przynajmniej jeszcze jeden raz, podając jako parametr
     * id_start wartość ostatniego elementu tablicy identyfikatorów otrzymanej w poprzednim wywołaniu.
     * Kolejne wywołanie będzie konieczne, jeśli liczba identyfikatorów bedzie równa 100. Zatem aby otrzymać
     * pełną listę identyfikatorów należy wywoływać metodę tyle razy, aż na wyjściu pojawi się tablica
     * z mniej niż 100 identyfikatorami.
     * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/functions/f_pickup_get_ids.htm
     *
     * @param int $idStart
     * @return ArrayCollection
     */
    public function getPickupIds($idStart = 0)
    {
        $response = $this->request('adePickup_GetIDs', array('id_start' => $idStart));

        return $response;
    }

    /**
     * Pobiera infromacje na temat potwierdzenia nadania.
     * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/functions/f_pickup_get.htm
     *
     * @param $id
     * @return Pickup
     */
    public function getPickup($id)
    {
        $response = $this->request('adePickup_Get', array('id' => $id), 'Webit\GlsAde\Model\Pickup');

        return $response;
    }

    /**
     * Metoda daje dostęp do danych przesyłki z potwierdzenia nadania.
     * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/functions/f_pickup_get_consign.htm
     *
     * @param int $id
     * @return Consignment
     */
    public function getConsignment($id)
    {
        /** @var Consignment $response */
        $response = $this->request('adePickup_GetConsign', array('id' => $id), 'Webit\GlsAde\Model\Consignment');

        if ($response) {
            $response->setId($id);
            $response->setDispatched(true);
        }

        return $response;
    }

    /**
     * Metoda daje dostęp do identyfikatorów przesyłek z potwierdzenia nadania o wskazanym identyfikatorze.
     * Zwracanych jest nie więcej niż 100 identyfikatorów uporządkowanych malejąco.
     * Pierwsze wywołanie funkcji powinno się odbyć z parametrem id_start = 0.
     * Zostanie wtedy zwróconych nie więcej niż 100 identyfikatorów uporządkowanych malejąco
     * (tym samym pierwsze wywołanie funkcji daje zawsze najnowsze identyfikatory) mniejszych niż id_start.
     * Jeśli zwróconych zostanie mniej niż 100 identyfikatorów, oznacza to że zostały pobrane wszystkie.
     * Natomiast jeśli zostanie zwróconych 100 identyfikatorów, należy wywołać funkcję przynajmniej jeszcze jeden raz,
     * podając jako parametr id_start wartość ostatniego elementu tablicy identyfikatorów otrzymanej
     * w poprzednim wywołaniu. Kolejne wywołanie będzie konieczne, jeśli liczba identyfikatorów bedzie równa 100.
     * Zatem aby otrzymać pełną listę identyfikatorów należy wywoływać metodę tyle razy, aż na wyjściu pojawi się
     * tablica z mniej niż 100 identyfikatorami.
     * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/functions/f_pickup_consign_get_ids.htm
     *
     * @param int $pickupId
     * @param int $idStart
     * @return ArrayCollection
     */
    public function getConsignmentIds($pickupId, $idStart = 0)
    {
        $response = $this->request(
            'adePickup_GetConsignIDs',
            array('id' => $pickupId, 'id_start' => $idStart)
        );

        return $response;
    }

    /**
     * Metoda pobiera druk potwierdzenia nadania.
     * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/functions/f_pickup_get_receipt.htm
     *
     * @param int $id
     * @return \SplFileInfo
     */
    public function getPickupReceipt($id, $mode = PickupReceiptModes::MODE_CONDENSED)
    {
        $response = $this->request('adePickup_GetReceipt', array('id' => $id, 'mode' => $mode));

        $file = new \SplFileInfo(tempnam(sys_get_temp_dir(), 'receipt'));
        file_put_contents($file->getPathname(), base64_decode($response->get('receipt')));

        return $file;
    }

    /**
     * Metoda pobiera z systemu etykiety ze wszystkich przesyłek z pojedynczego potwierdzenia nadania.
     * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/functions/f_pickup_get_labels.htm
     *
     * @param int $id
     * @param string $mode
     * @return \SplFileInfo
     */
    public function getPickupLabels($id, $mode = ConsignmentLabelModes::MODE_ONE_LABEL_ON_A4_PDF)
    {
        $response = $this->request('adePickup_GetLabels', array('id' => $id, 'mode' => $mode));

        $file = new \SplFileInfo(tempnam(sys_get_temp_dir(), 'label'));
        file_put_contents($file->getPathname(), base64_decode($response->get('labels')));

        return $file;
    }

    /**
     * Metoda pobiera druki IDENT z potwierdzenia nadania.
     * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/functions/f_pickup_get_ident.htm
     * @param int $id
     * @return \SplFileInfo
     */
    public function getIdentPrint($id)
    {
        $response = $this->request('adePickup_GetIdent', array('id' => $id));
        $file = new \SplFileInfo(tempnam(sys_get_temp_dir(), 'ident'));
        file_put_contents($file->getPathname(), base64_decode($response->get('ident')));

        return $file;
    }

    /**
     * Pozwala pobrać z systemu etykiety dla przesyłki znajdującej się na dowolnym potwierdzeniu nadania.
     * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/functions/f_pikcup_get_consign_labels.htm
     *
     * @param int $id
     * @param string $mode
     * @return \SplFileInfo
     */
    public function getConsignmentLabels($id, $mode = ConsignmentLabelModes::MODE_ONE_LABEL_ON_A4_PDF)
    {
        $response = $this->request('adePickup_GetConsignLabels', array('id' => $id, 'mode' => $mode));

        $file = new \SplFileInfo(tempnam(sys_get_temp_dir(), 'label'));
        file_put_contents($file->getPathname(), base64_decode($response->get('labels')));

        return $file;
    }

    /**
     * Metoda pozwala uzyskać dane przesyłki, na podstawie numeru paczki.
     * Poszukiwanie dotyczy wyłącznie paczek z istniejących potwierdzeń nadania
     * (czyli wszytskich znajdujących się poza przygotowalnią).
     * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/functions/f_pickup_parcel_num_search.htm
     *
     * @param string $number
     * @return Consignment
     */
    public function searchParcel($number)
    {
        $response = $this->request(
            'adePickup_ParcelNumberSearch',
            array('number' => $number),
            'Webit\GlsAde\Model\Consignment'
        );

        return $response;
    }
}
