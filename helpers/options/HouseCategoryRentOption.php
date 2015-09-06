<?php

class HouseCategoryRentOption
{
    use TraitJsonOption;

    const NHA_RIENG     = 0;
    const CAN_HO        = 1;
    const NHA_BIET_THU  = 2;
    const NHA_MAT_PHO   = 3;
    const DAT_NEN_DU_AN = 4;
    const DAT	        = 5;
    const KHO_NHA_XUONG = 6;
    const NHA_TRO       = 7;
    const VAN_PHONG     = 8;
    const CUA_HANG      = 9;
    const KHAC          = 10;

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
            self::NHA_TRO       => 'Nhà trọ',
            self::VAN_PHONG     => 'Văn phòng',
            self::CUA_HANG      => 'Kiot, cửa hàng',
            self::KHAC          => 'Thể loại khác'
        ];
    }
}
