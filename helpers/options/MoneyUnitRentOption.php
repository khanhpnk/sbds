<?php

class MoneyUnitRentOption
{
    public static function getOptions()
    {
        return ['VNĐ', 'VNĐ/tháng'];
    }

    public static function getJsonOptions()
    {
        $options = self::getOptions();
        return json_encode($options);
    }
}
