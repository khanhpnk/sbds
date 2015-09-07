<?php

class MoneyUnitSaleOption
{
    use TraitJsonOption;

    const VND           = 1;
    const VND_M2        = 2;
    const THOA_THUAN    = 3;

    public static function getOptions()
    {
        return [
            self::VND           => 'VNĐ',
            self::VND_M2        => 'VNĐ/m2',
            self::THOA_THUAN    => 'Thỏa thuận'
        ];
    }
}
