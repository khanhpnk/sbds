<?php

class HouseCategorySaleOption
{
    use TraitJsonOption;

    const NHA_RIENG     = 0;
    const CAN_HO        = 1;
    const NHA_BIET_THU  = 2;
    const NHA_MAT_PHO   = 3;
    const DAT_NEN_DU_AN = 4;
    const DAT	        = 5;
    const KHO_NHA_XUONG = 6;
    const TRANG_TRAI	= 7;
    const KHAC		    = 8;

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
}
