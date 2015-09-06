<?php

class HouseLicenseOption
{
    const GIAY_PHEP_XAY_DUNG    = 0;
    const HOP_DONG_MUA_BAN      = 1;
    const SO_DO                 = 2;
    const SO_HONG               = 3;

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
