<?php

class SellUnitOption
{
    const VND		            = 1;
    const VND_TREN_M2		    = 2;
    const THOA_THUAN		    = 3;

    public static function getOptions()
    {
        return array(
            self::VND   	            => 'VNĐ',
            self::VND_TREN_M2   	    => 'VNĐ/m2',
            self::THOA_THUAN   	        => 'Thỏa thuận',
//            self::TRIEU                 => 'Triệu',
//            self::TY                    => 'Tỷ',
//            self::TRAM_NGHIN_TREN_M2    => 'Trăm nghìn/m2',
//            self::TRIEU_TREN_M2         => 'Triệu/m2',
        );
    }

    public static function getLabel($type)
    {
        $options = self::getOptions();
        return $options[$type];
    }
}
