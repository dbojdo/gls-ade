<?php
/**
 * File: PostCodeApi.php
 * Created at: 2014-11-24 05:55
 */
 
namespace Webit\GlsAde\Api;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class PostCodeApi
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/function_list.htm
 * Kody pocztowe
 */
class PostCodeApi extends AbstractSessionAwareApi
{
    /**
     * Metoda pozwala na uzyskanie ustalenie nazwy miejscowości na podstawie kodu pocztowego.
     * @see https://ade-test.gls-poland.com/adeplus/pm1/html/webapi/functions/f_zip_get_city.htm
     *
     * @param string $country Kod kraju (zgodny z ISO 3166-1 alfa-2)
     * @param string $postCode Kod pocztowy
     * @return string
     */
    public function getCity($country, $postCode)
    {
        $response = $this->request('adeZip_GetCity', array('country' => $country, 'zipcode' => $postCode));

        return $response->get('city');
    }
}
