<?php

class MoneyUnitRentOption
{
    use TraitJsonOption;

    const VND        = 0;
    const VND_THANG  = 1;

    public static function getOptions()
    {
        return [
            self::VND       => 'VNĐ',
            self::VND_THANG => 'VNĐ/tháng'
        ];
    }
}
