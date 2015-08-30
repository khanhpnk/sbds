<?php

class RentType
{
    const HOME		    = 1;
    const APARTMENT		= 2;
    const VILLA		    = 3;
    const STREET_SIDE   = 4;
    const PROJECT_LAND  = 5;
    const LAND		    = 6;
    const WAREHOUSE		= 7;
    const MOTEL		    = 8;
    const OFFICE		= 9;
    const SHOP		    = 10;
    const OTHER		    = 11;

    public static function getOptions()
    {
        return array(
            self::HOME   	    => 'Nhà riêng',
            self::APARTMENT     => 'Căn hộ',
            self::VILLA         => 'Nhà biệt thự, liền kê',
            self::STREET_SIDE   => 'Nhà mặt phố',
            self::PROJECT_LAND  => 'Đất nền dự án',
            self::LAND          => 'Đất',
            self::WAREHOUSE     => 'Kho, nhà xưởng',
            self::MOTEL         => 'Nhà trọ',
            self::OFFICE        => 'Văn phòng',
            self::SHOP          => 'Kiot, cửa hàng',
            self::OTHER         => 'Thể loại khác',
        );
    }

    public static function getLabel($type)
    {
        $options = self::getOptions();
        return $options[$type];
    }
}
