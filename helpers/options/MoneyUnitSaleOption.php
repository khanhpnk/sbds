<?php

class MoneyUnitSaleOption
{
    use TraitJsonOption;
    use TraitLabelOption;

    const THOA_THUAN   = 1;
    const TRIEU        = 2;
    const TY    = 3;
    const NGHIN_M2    = 4;
    const TRIEU_M2    = 5;

    public static function getOptions()
    {
        return [
            self::THOA_THUAN    => 'Thỏa thuận',
            self::TRIEU         => 'triệu',
            self::TY            => 'tỷ',
            self::NGHIN_M2      => 'nghìn/m2',
            self::TRIEU_M2      => 'triệu/m2',
        ];
    }
}
