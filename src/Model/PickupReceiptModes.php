<?php
/**
 * File: PickupReceiptModes.php
 * Created at: 2014-11-24 06:39
 */
 
namespace Webit\GlsAde\Model;

/**
 * Class PickupReceiptModes
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
final class PickupReceiptModes
{
    /**
     * plik PDF, z kodami kreskowymi
     */
    const MODE_WITH_BARCODES = 'with_barcodes';

    /**
     * plik PDF, skondensowany
     */
    const MODE_CONDENSED = 'condensed';

    /**
     * plik PDF, skondensowany z opisem potwierdzenia
     */
    const MODE_CONDENSED_DESCRIPTION_OF_PICKUP = 'condensed_description_of_pickup';

    /**
     * @return array
     */
    public static function getLabelModes()
    {
        $ref = new \ReflectionClass(get_called_class());

        return array_values($ref->getConstants());
    }
}
