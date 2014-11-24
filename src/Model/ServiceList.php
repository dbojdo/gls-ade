<?php
/**
 * ServiceList.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created on Nov 24, 2014, 13:26
 */

namespace Webit\GlsAde\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Class ServiceList
 * @package Webit\GlsAde\Model
 */
class ServiceList
{
    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("srv_ade")
     *
     * @var string
     */
    private $servicesAde;

    /**
     * @JMS\Type("Webit\GlsAde\Model\ServicesBool")
     * @JMS\SerializedName("srv_bool")
     *
     * @var ServicesBool
     */
    private $servicesBool;

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
}
