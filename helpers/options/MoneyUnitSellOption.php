<?php

class MoneyUnitSellOption
{
    public static function getOptions()
    {
        return ['VNĐ', 'VNĐ/m2', 'Thỏa thuận'];
    }

    public static function getLabel($type)
    {
        $options = self::getOptions();
        return $options[$type];
    }

    public static function getJsonOptions()
    {
        $options = self::getOptions();
        return json_encode($options);
    }
}
