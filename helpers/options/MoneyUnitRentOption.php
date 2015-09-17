<?php

class MoneyUnitRentOption
{
    use TraitJsonOption;
    use TraitLabelOption;

    const THOA_THUAN        = 1;
    const NGHIN_THANG  = 2;
    const TRIEU_THANG  = 3;
    const NGHIN_M2_THANG  = 4;
    const TRIEU_M2_THANG  = 5;

    public static function getOptions()
    {
        return [
            self::THOA_THUAN    => 'Thỏa thuận',
            self::NGHIN_THANG    => 'nghìn/tháng',
            self::TRIEU_THANG    => 'triệu/tháng',
            self::NGHIN_M2_THANG       => 'nghìn/m2/tháng',
            self::TRIEU_M2_THANG => 'triệu/m2/tháng'
        ];
    }
}
