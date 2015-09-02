<?php

class DirectionOption
{
    public static function getOptions()
    {
        return ['Đông', 'Tây', 'Nam', 'Bắc', 'Đông bắc', 'Tây bắc', 'Đông nam', 'Tây nam'];
    }

    public static function getLabel($type)
    {
        $options = self::getOptions();
        return $options[$type];
    }
}
