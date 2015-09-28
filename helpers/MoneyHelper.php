<?php

class MoneyHelper
{
    public static function price($price, $moneyUnit, $isSale)
    {
        if (MoneyUnitSaleOption::THOA_THUAN == $moneyUnit) {
            return MoneyUnitSaleOption::THOA_THUAN;
        }

        if (IsSaleOption::BAN == $isSale) {
            return $price . ' ' . MoneyUnitSaleOption::getLabel($moneyUnit);
        } else if (IsSaleOption::CHO_THUE == $isSale) {
            return $price . ' ' . MoneyUnitRentOption::getLabel($moneyUnit);
        }
    }
}
