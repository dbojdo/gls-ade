<?php
/**
 * File: SenderAddressApi.php
 * Created at: 2014-11-24 06:24
 */
 
namespace Webit\GlsAde\Api;

/**
 * Class SenderAddressApi
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/function_list.htm
 * Adresy nadawców
 */
class SenderAddressApi extends AbstractSessionAwareApi
{

    /**
     * Metoda pozwala ustalić czy zalogowany użytkownik posiada dostęp do opcji związanych z usługą zmiany adresu
     * nadawcy przesyłki. Domyślnie (i w zdecydowanej większości przypadków) adres nadawcy przesyłki jest tożsamy
     * z danymi adresowymi firmy zarejestrowanej w ADE+. Jeśli usługa zamiany adresu nadawcy jest dostępna
     * dla użytkownika, oznacza to, że na etykiecie może się pojawić inny adres nadawcy niż adres zarejestrowanej firmy.
     *
     * Wartość statusu równa 0 (zero) oznacza, że użytkownik nie posiada dostępu do usługi zmiany adresu nadawcy
     * (adres nadawcy jest taki sam jak adres zarejestrowanej firmy),
     * status równy 1 (jeden) oznacza przyporządkowanie do użytkownika stałego adresu nadawcy
     * (użytkownik nie może go zmienić, ten adres może być różny od adresu firmy),
     * status równy 2 (dwa) oznacza, że użytkownik ma dostęp do listy adresów dostawy
     * (dostępnych za pomocą funkcji adeSendAddr_GetDictionary),
     * status równy 3 (trzy) oznacza, że użytkownik może się posłużyć dowolnym adresem nadawcy.
     *
     * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/functions/f_sendaddr_get_status.htm
     *
     * @return int
     */
    public function getSenderAddressStatus()
    {
        $response = $this->request('adeSendAddr_GetStatus');

        return $response;
    }

    /**
     * Metoda pozwala ustalić listę dozwolonych do użytku adresów nadawcy, używanych przy dodawaniu
     * paczki do przygotowalni. Wykorzystywana razem z metodą adeSendAddr_GetStatus,
     * która zwróciła wartość 2 (jeśli status wynosi 1, metoda adeSendAddr_GetDictionary
     * zwróci jednoelementową tablicę ze stałym adresem nadawcy, jeśli natomiast status
     * wynosi 0 lub 3, metoda zwróci pustą tablicę).
     *
     * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/functions/f_sendaddr_get_dictionary.htm
     *
     * @return array
     */
    public function getSenderAddressDictionary()
    {
        $response = $this->request('adeSendAddr_GetDictionary');

        return $response;
    }
}
