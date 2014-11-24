<?php
/**
 * File: ConsignmentPrepareApi.php
 * Created at: 2014-11-24 05:58
 */
 
namespace Webit\GlsAde\Api;

use Webit\GlsAde\Model\Consignment;
use Webit\GlsAde\Model\ConsignmentLabelModes;

/**
 * Class ConsignmentPrepareApi
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/function_list.htm
 * Przygotowywanie paczek/przesyłek (przygotowalnia)
 */
class ConsignmentPrepareApi extends AbstractSessionAwareApi
{
    /**
     * Metoda pozwala na dodanie nowej przesyłki/paczki do tzw. przygotowalni.
     * Metoda nie nadaje paczkom numerów (za wyjątkiem paczek z usługami PS i PR).
     * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/functions/f_prepbox_insert.htm
     *
     * @param Consignment $consignment Dane przesyłki
     * @return int
     */
    public function insertConsignment(Consignment $consignment)
    {
        $response = $this->request('adePreparingBox_Insert', array('consign_prep_data' => $consignment));

        return $response;
    }

    /**
     * Metoda daje dostęp do identyfikatorów przesyłek znajdujących się w przygotowalni.
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
     * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/functions/f_prepbox_getids.htm
     *
     * @param int $idStart
     * @return array
     */
    public function getConsignmentIds($idStart = 0)
    {
        $response = $this->request('adePreparingBox_GetConsignIDs', array('id_start' => $idStart));
//          ConsignsIDsArray - Tablica z identyfikatorami przesyłek
        return $response;
    }

    /**
     * Metoda daje dostęp do danych przesyłki z przygotowalni.
     * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/functions/f_prepbox_get_consign.htm
     *
     * @param int $id
     * @return Consignment
     */
    public function getConsignment($id)
    {
        $response = $this->request('adePreparingBox_GetConsign', array('id' => $id));
//        Consign - Dane przesyłki
        return $response;
    }

    /**
     * Metoda pozwala na usunięcie przesyłki z przygotowalni.
     * Nie można usunąć przesyłek z usługa PS i PR. Nie jest zalecane usuwanie przesyłek,
     * których paczki posiadają nadane numery. Powoduje to utratę numerów z puli numerów Użytkownika
     * i w może doprowadzić do problemów z pracą z systemem.
     * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/functions/f_prepbox_delete_consign.htm
     *
     * @param $id
     * @return int
     */
    public function deleteConsignment($id)
    {
        $response = $this->request('adePreparingBox_DeleteConsign', array('id' => $id));
//        array(
//            id | long - Identyfikator usuniętej przesyłki
//          )
        return $response;
    }

    /**
     * Pozwala pobrać z systemu etykiety dla przesyłki znajdującej się w przygotowalni.
     * Przesyłka bez numerów paczek automatycznie je otrzymuje.
     * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/functions/f_prepbox_get_consign_labels.htm
     *
     * @param int $id
     * @param string $mode
     * @return string
     */
    public function getConsignmentLabels($id, $mode = ConsignmentLabelModes::MODE_ONE_LABEL_ON_A4_PDF)
    {
        $response = $this->request('adePreparingBox_GetConsignLabels', array('id' => $id, 'mode' => $mode));
//        array(
//            labels | string - Plik z etykietami (zakodowany MIME base64)
//        )
        return $response;
    }

    /**
     * Pozwala pobrać z systemu etykiety oraz druk usługi IDENT dla przesyłki znajdującej się w przygotowalni.
     * Przesyłka bez numerów paczek automatycznie je otrzymuje.
     * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/functions/f_prepbox_get_consign_docs.htm
     *
     * @param $id
     * @param string $mode
     * @return string
     */
    public function getConsignmentDocuments($id, $mode = ConsignmentLabelModes::MODE_ONE_LABEL_ON_A4_PDF)
    {
        $response = $this->request('adePreparingBox_GetConsignDocs', array('id' => $id, $mode => $mode));
//        array(
//            labels | string - Plik z etykietami (zakodowany MIME base64)
//            ident | string - Plik z drukiem IDENT (zakodowany MIME base64). Jeśli pusty, to brak jest w przesyłce usługi IDENT.
//        )
        return $response;
    }
}
