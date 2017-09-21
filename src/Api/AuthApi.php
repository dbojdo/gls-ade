<?php

namespace Webit\GlsAde\Api;

use Doctrine\Common\Collections\ArrayCollection;
use Webit\GlsAde\Model\AdeAccount;

class AuthApi extends AbstractApi
{

    /**
     * Metoda pozwala zalogować sie do systemu po podaniu nazwy użytkownika i hasła.
     * W przypadku prawidłowego wyniku autoryzacji zwracany jest unikalny indentyfikator sesji,
     * którym należy się posługiwać przy wywoływaniu innych metod systemu.
     * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/functions/f_login.htm
     *
     * @param AdeAccount $account
     * @return string Session ID
     */
    public function login(AdeAccount $account)
    {
        /** @var ArrayCollection $result */
        $result = $this->request(
            'adeLogin',
            array(
                'user_name' => $account->getUsername(),
                'password' => $account->getPassword()
            )
        );

        return $result->get('session');
    }

    /**
     * Metoda pozwala na wylogowanie się z systemu i usunięcie identyfikatora sesji.
     * Jej wywołanie po zakończeniu wymiany danych z ADE nie jest konieczne, ale zalecane ze względów bezpieczeństwa.
     * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/functions/f_logout.htm
     *
     * @param string $session
     * @return string Session ID
     */
    public function logout($session)
    {
        /** @var ArrayCollection $result */
        $result = $this->request('adeLogout', array('session' => $session));

        return $result->get('session');
    }
}
