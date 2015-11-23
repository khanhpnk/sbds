<?php

namespace App\Repositories\Resource\House;

class OwnerTypeOptions
{
    const CHINH_CHU = 0;
    const MOI_GIOI  = 1;

    /**
     * @return array
     */
    public static function getOptions()
    {
        return array(
            self::CHINH_CHU => 'Chính chủ',
            self::MOI_GIOI  => 'Môi giới'
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
