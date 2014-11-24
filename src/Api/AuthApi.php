<?php

namespace Webit\GlsAde\Api;

class AuthApi extends AbstractApi
{

    /**
     * Metoda pozwala zalogować sie do systemu po podaniu nazwy użytkownika i hasła.
     * W przypadku prawidłowego wyniku autoryzacji zwracany jest unikalny indentyfikator sesji,
     * którym należy się posługiwać przy wywoływaniu innych metod systemu.
     * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/functions/f_login.htm
     *
     * @param string $userName
     * @param string $password
     * @return string - Session ID
     */
    public function login($userName, $password)
    {
        $response = $this->request('adeLogin', array('user_name' => $userName, 'password' => $password));
//        array(
//            session | string - Identyfikator sesji
//        )
        return $response;
    }

    /**
     * Metoda pozwala na wylogowanie się z systemu i usunięcie identyfikatora sesji.
     * Jej wywołanie po zakończeniu wymiany danych z ADE nie jest konieczne, ale zalecane ze względów bezpieczeństwa.
     * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/functions/f_logout.htm
     *
     * @param string $session
     */
    public function logout($session)
    {
        $response = $this->request('adeLogout', array('session' => $session));
//        array(
//            session | string - Identyfikator usuniętej sesji
//        )
        return $response;
    }
}
