<?php

namespace App\Repositories\Resource\House\Sale;

class CategoryOptions
{
    const NHA_RIENG     = 1;
    const CAN_HO        = 2;
    const NHA_BIET_THU  = 3;
    const NHA_MAT_PHO   = 4;
    const DAT_NEN_DU_AN = 5;
    const DAT	        = 6;
    const KHO_NHA_XUONG = 7;
    const TRANG_TRAI	= 8;
    const KHAC		    = 9;

    /**
     * @return array
     */
    public static function getOptions()
    {
        return [
            self::NHA_RIENG     => 'Nhà riêng',
            self::CAN_HO        => 'Căn hộ',
            self::NHA_BIET_THU  => 'Nhà biệt thự, liền kê',
            self::NHA_MAT_PHO   => 'Nhà mặt phố',
            self::DAT_NEN_DU_AN => 'Đất nền dự án',
            self::DAT           => 'Đất',
            self::KHO_NHA_XUONG => 'Kho, nhà xưởng',
            self::TRANG_TRAI    => 'Trang trại, khu nghỉ dưỡng',
            self::KHAC          => 'Thể loại khác'
        ];
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

    /**
     * JSON need to compatible with Select2 Plugin Jquery
     *
     * @return string JSON
     */
    public static function getJsonOptions()
    {
        $options = self::getOptions();
        $array = [];
        foreach ($options as $key => $value) {
            $array[] = ['id' => $key, 'text' =>$value];
        }

        return json_encode($array);
    }
}
