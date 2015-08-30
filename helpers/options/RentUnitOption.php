<?php

class RentUnitOption
{
    const VND		            = 1;
    const VND_TREN_THANG		= 2;

    public static function getOptions()
    {
        return array(
            self::VND   	                    => 'VNĐ',
            self::VND_TREN_THANG   	            => 'VNĐ/tháng',
//            self::TRAM_NGHIN_TREN_THANG   	    => 'Trăm nghìn/tháng',
//            self::TRIEU_THANG                   => 'Triệu/tháng',
//            self::TRAM_NGHIN_TREN_M2_TREN_THANG => 'Trăm nghìn/m2/tháng',
//            self::TRIEU_TREN_M2_TREN_THANG      => 'Triệu/m2/tháng',
        );
    }

    public static function getLabel($type)
    {
        $options = self::getOptions();
        return $options[$type];
    }
}
