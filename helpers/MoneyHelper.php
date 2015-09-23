<?php

class MoneyHelper
{
    public static function price($price, $moneyUnit, $isSale)
    {
        if (MoneyUnitSaleOption::THOA_THUAN == $moneyUnit) {
            return MoneyUnitSaleOption::THOA_THUAN;
        }

        if (1 == $isSale) {
            return $price . ' ' . MoneyUnitSaleOption::getLabel($moneyUnit);
        } else if (2 == $isSale) {
            return $price . ' ' . MoneyUnitRentOption::getLabel($moneyUnit);
        }
    }
}
