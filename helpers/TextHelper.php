<?php

class TextHelper
{
    public static function isSale($isSale)
    {
        switch ($isSale) {
            case IsSaleOption::BAN:
                return 'Nhà đất bán';
                break;
            case IsSaleOption::CHO_THUE:
                return 'Nhà đất cho thuê';
                break;
        }
    }
}
