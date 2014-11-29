<?php
/**
 * File: ProfileApi.php
 * Created at: 2014-11-24 05:28
 */
 
namespace Webit\GlsAde\Api;

use Doctrine\Common\Collections\ArrayCollection;
use Webit\GlsAde\Model\Profile;

/**
 * Class ProfileApi
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/function_list.htm
 * Profile
 */
class ProfileApi extends AbstractSessionAwareApi
{

    /**
     * Metoda pozwala pobrać infromacje na temat dostępnych profili użytkownika (jeden użytkownik może
     * np. posiadać konta w kilku firmach i jego uprawnienia w takiej firmie określa profil).
     * W większości przypadków użytkownik ma tylko jeden profil.
     * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/functions/f_profile_get_ids.htm
     *
     * @return ArrayCollection
     */
    public function getProfiles()
    {
        $profiles = $this->request('adeProfile_GetIDs', null, 'ArrayCollection<Webit\GlsAde\Model\Profile>');

        return $profiles;
    }

    /**
     * Metoda umożliwia zmianę profilu, na podstawie identyfikatora uzyskanego z adeProfile_GetIDs.
     * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/functions/f_profile_change.htm
     *
     * @param int $profileId
     * @return Profile
     */
    public function changeProfile($profileId)
    {
        $profile = $this->request('adeProfile_Change', array('id' => $profileId), 'Webit\GlsAde\Model\Profile');
        // Profile - Tablica z informacjami na temat profilu, na który nastąpiła zmiana.

        return $profile;
    }
}
