<?php

class UrlHelper
{
    public static function all($isSale, $options = [])
    {
        switch ($isSale) {
            case IsSaleOption::BAN:
                return route('house.saleList', $options);
                break;
            case IsSaleOption::CHO_THUE:
                return route('house.rentList', $options);
                break;
        }
    }

    public static function show($isSale, $options = [])
    {
        switch ($isSale) {
            case IsSaleOption::BAN:
                return route('house.saleShow', $options);
                break;
            case IsSaleOption::CHO_THUE:
                return route('house.rentShow', $options);
                break;
        }
    }
}
