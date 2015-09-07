<?php

class MoneyUnitRentOption
{
    use TraitJsonOption;

    const VND        = 1;
    const VND_THANG  = 2;

    public static function getOptions()
    {
        return [
            self::VND       => 'VNĐ',
            self::VND_THANG => 'VNĐ/tháng'
        ];
    }
}
