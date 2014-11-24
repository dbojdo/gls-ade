<?php
/**
 * File: ServiceApi.php
 * Created at: 2014-11-24 05:42
 */
 
namespace Webit\GlsAde\Api;

/**
 * Class ServiceApi
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/function_list.htm
 * Serwisy
 */
class ServiceApi extends AbstractSessionAwareApi
{
    /**
     * Metoda podaje informacje na temat dostępnych dla użytkownika usług (serwisów) dla przesyłek.
     * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/functions/f_srv_getallowed.htm
     *
     * @return array
     */
    public function getAllowedServices()
    {
        $response = $this->request('adeServices_GetAllowed');
//        array(
//            srv_ade | string - Usługi zapisane w standardzie ADE. Zawartość elementu użyta na wejściu jest ignorowana. Przykład zawartości: COD 120.00PLN,EXW,ROD,POD,12:00.
//            srv_bool | ServicesBool  - Tablica z listą usług.
//        )
        return $response;
    }

    /**
     * Metoda pozwala na uzyskanie maksymalnej dla danego użytkownika kwoty dla usługi COD (kwoty pobrania za towar).
     * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/functions/f_srv_cod_max.htm
     *
     * @return string
     */
    public function getMaxCodAmount()
    {
        $response = $this->request('adeServices_GetMaxCOD');
//        array(
//            cod_max | string - maksymalna kwota usługi COD.
//        )
        return $response;
    }

    /**
     * Metoda pozwala uzyskać informację na temat maksymalnej wagi paczki jaką można wprowadzić do systemu.
     * Przesyłka może składać się z kilku paczek, zatem przesyłka może mieć wagę wiekszą niż paczka.
     * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/functions/f_srv_get_max_parcelweights.htm
     *
     * @return array
     */
    public function getMaxParcelsWeight()
    {
        $response = $this->request('adeServices_GetMaxParcelWeights');
//        array(
//            weight_max_national | string - maksymalna waga paczki krajowej wyrażona w kg.
//            weight_max_international | string  - maksymalna waga paczki międzynarodowej wyrażona w kg.
//        )
        return $response;
    }

    /**
     * Metoda pozwala uzyskać informacje na temat dostępności serwisów gwarantowanych
     * (dostawa do godz. 10:00, dostawa do godz. 12:00, dostawa w sobotę) dla podanego kodu pocztowego.
     * Uzyskując w elemencie wyjściowym srv_ade ciąg 10:00, 12:00, SAT, otrzymujemy informacje
     * że dla podanego kodu pocztowego dostępne są usługi dostawy do godz.10:00,
     * dostawy do godz. 12:00 oraz dostawy w sobotę. Jeśli uzyskamu ciąg 12:00, SAT,
     * oznacza to że dostępna jest usługa dostyawy do godz. 12:00 oraz w sobotę,
     * ale jest niedostępna usługa dostawy do godz. 10:00.
     * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/functions/f_srv_get_guaranteed.htm
     *
     * @param string $zipCode
     * @return array
     */
    public function getGuaranteedServices($zipCode)
    {
        $response = $this->request('adeServices_GetGuaranteed', array('zipcode' => $zipCode));
//        array(
//            srv_ade | string - wykaz usług gwarantowanych (podzbiór usług zapisanych w standardzie ADE).
//            srv_bool | ServicesBool  - Tablica z listą usług.
//        )
        return $response;
    }
}
