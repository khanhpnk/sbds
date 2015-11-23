<?php

use App\Repositories\Resource\House\SaleTypeOptions;

class MoneyHelper
{
    public static function price($price, $moneyUnit, $saleType)
    {
        if (MoneyUnitSaleOption::THOA_THUAN == $moneyUnit) {
            return MoneyUnitSaleOption::getLabel($moneyUnit);
        }

        if (SaleTypeOptions::BAN == $saleType) {
            return $price . ' ' . MoneyUnitSaleOption::getLabel($moneyUnit);
        } else if (SaleTypeOptions::CHO_THUE == $saleType) {
            return $price . ' ' . MoneyUnitRentOption::getLabel($moneyUnit);
        }
    }
}
