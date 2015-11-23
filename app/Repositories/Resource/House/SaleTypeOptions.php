<?php

namespace App\Repositories\Resource\House;

class SaleTypeOptions
{
    const BAN = 0;
    const CHO_THUE  = 1;

    /**
     * @return array
     */
    public static function getOptions()
    {
        return array(
            self::BAN        => 'Bán',
            self::CHO_THUE  => 'Cho thuê'
        );
    }

    /**
     * @param int $type
     * @return string
     */
    public static function getLabel($type)
    {
        $options = self::getOptions();
        return $options[$type];
    }
}
