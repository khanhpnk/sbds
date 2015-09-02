<?php

class LegalOption
{
    public static function getOptions()
    {
        return ['Giấy phép xây dựng', 'Hợp đồng mua bán', 'Sổ đỏ', 'Sổ hồng'];
    }

    public static function getLabel($type)
    {
        $options = self::getOptions();
        return $options[$type];
    }
}
