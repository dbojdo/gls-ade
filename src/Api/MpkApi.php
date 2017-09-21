<?php

namespace Webit\GlsAde\Api;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class MpkApi
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/function_list.htm
 * MPK
 */
class MpkApi extends AbstractSessionAwareApi
{
    /**
     * Metoda pozwala ustalić czy zalogowany użytkownik posiada dostęp do opcji związanych z MPK
     * (Miejsce Powstawania Kosztu). Identyfikator MPK, jeśli jest zdefiniowany,
     * jest umieszczany w polu pfc struktury Consign w czasie dodawania paczek do systemu
     * (wykorzystywany jest m.in. w podsystemie raportowania ADE+).
     *
     * Wartość statusu równa 0 (zero) oznacza, że użytkownik nie posiada przypisanego identyfikatora MPK,
     * status równy 1 (jeden) oznacza przyporządkowanie do użytkownika stałego identyfikatora MPK
     * (użytkownik nie może go zmienić), status równy 2 (dwa) oznacza, że użytkownik ma dostęp do listy (słownika)
     * identyfikatorów MPK (dostępnych za pomocą funkcji adePfc_GetDictionary).
     * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/functions/f_pfc_get_status.htm
     * @return int
     */
    public function getMpkStatus()
    {
        $response = $this->request('adePfc_GetStatus');

        return $response->get('status');
    }

    /**
     * Metoda pozwala ustalić listę dozwolonych do użytku identyfikatorów MPK,
     * używanych przy dodawaniu paczki do przygotowalni. Wykorzystywana razem z metodą adePfc_GetStatus,
     * która zwróciła wartość 2 (jeśli status wynosi 1, metoda adePfc_GetDictionary zwróci jednoelementową tablicę
     * ze stałym identyfikatorem MPK, jeśli natomiast status wynosi 0, metoda zwróci pustą tablicę).
     *
     * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/functions/f_pfc_get_dictionary.htm
     *
     * @return string
     */
    public function getMpkDictionary()
    {
        /** @var ArrayCollection $response */
        $response = $this->request('adePfc_GetDictionary');

        return $response->count() ? $response->get(0) : null;
    }
}
 