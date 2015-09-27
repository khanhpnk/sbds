<?php

class TextHelper
{
    public static function resource($isSale)
    {
        switch ($isSale) {
            case ResourceOption::BAN:
                return 'Bán';
                break;
            case ResourceOption::CHO_THUE:
                return 'Cho thuê';
                break;
            case ResourceOption::DU_AN:
                return 'Dự án';
                break;
        }
    }
}
