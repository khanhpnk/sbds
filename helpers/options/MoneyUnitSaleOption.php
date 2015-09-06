<?php

class MoneyUnitSaleOption
{
    use TraitJsonOption;

    const VND           = 0;
    const VND_M2        = 1;
    const THOA_THUAN    = 2;

    public static function getOptions()
    {
        return [
            self::VND           => 'VNĐ',
            self::VND_M2        => 'VNĐ/m2',
            self::THOA_THUAN    => 'Thỏa thuận'
        ];
    }
}
