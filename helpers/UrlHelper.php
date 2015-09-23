<?php

class UrlHelper
{
    public static function all($isSale, $options)
    {
        if (IsSaleOption::BAN == $isSale) {
            return route('house.saleList', $options);
        } elseif (IsSaleOption::CHO_THUE == $isSale) {

        }


    }
}
