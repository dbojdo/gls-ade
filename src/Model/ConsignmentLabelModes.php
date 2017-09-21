<?php

namespace Webit\GlsAde\Model;

/**
 * Class ConsignmentLabelModes
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
final class ConsignmentLabelModes
{
    /**
     * plik PDF, jedna etykieta na A4
     */
    const MODE_ONE_LABEL_ON_A4_PDF = 'one_label_on_a4_pdf';

    /**
     * plik PDF, cztery etykiety na A4, pierwsza etykieta drukowana od lewej
     */
    const MODE_FOUR_LABELS_ON_A4_PDF = 'four_labels_on_a4_pdf';

    /**
     * plik PDF, cztery etykiety na A4, pierwsza etykieta drukowana od prawej
     */
    const MODE_FOUR_LABELS_ON_A4_RIGHT_PDF = 'four_labels_on_a4_right_pdf';

    /**
     * plik PDF, jedna etykieta na kartce o wymiarach 160mm x 100mm
     */
    const MODE_ROLL_160X100_PDF = 'roll_160x100_pdf';

    /**
     * plik w języku DPL (na drukarki termiczne)
     */
    const MODE_ROLL_160X100_DATAMAX = 'roll_160x100_datamax';

    /**
     * plik w języku ZPL (na drukarki termiczne)
     */
    const MODE_ROLL_160X100_ZEBRA = 'roll_160x100_zebra';

    /**
     * plik w języku EPL (na drukarki termiczne)
     */
    const MODE_ROLL_160X100_ZEBRA_EPL = 'roll_160x100_zebra_epl';

    /**
     * @return array
     */
    public static function getLabelModes()
    {
        $ref = new \ReflectionClass(get_called_class());

        return array_values($ref->getConstants());
    }
}
