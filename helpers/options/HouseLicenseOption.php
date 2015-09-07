<?php

class HouseLicenseOption
{
    const GIAY_PHEP_XAY_DUNG    = 1;
    const HOP_DONG_MUA_BAN      = 2;
    const SO_DO                 = 3;
    const SO_HONG               = 4;

    public static function getOptions()
    {
        return [
            self::GIAY_PHEP_XAY_DUNG    => 'Giấy phép xây dựng',
            self::HOP_DONG_MUA_BAN      => 'Hợp đồng mua bán',
            self::SO_DO                 => 'Sổ đỏ',
            self::SO_HONG               => 'Sổ hồng'
        ];
    }
}
