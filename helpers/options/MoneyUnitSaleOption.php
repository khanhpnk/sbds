<?php

class MoneyUnitSaleOption
{
    public static function getOptions()
    {
        return ['VNĐ', 'VNĐ/m2', 'Thỏa thuận'];
    }

    public static function getJsonOptions()
    {
        $options = self::getOptions();
        return json_encode($options);
    }
}
