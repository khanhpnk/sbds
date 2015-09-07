<?php

class HouseDirectionOption
{
    const DONG      = 1;
    const TAY       = 2;
    const NAM       = 3;
    const BAC       = 4;
    const DONG_BAC  = 5;
    const TAY_BAC   = 6;
    const DONG_NAM  = 7;
    const TAY_NAM   = 8;

    public static function getOptions()
    {
        return array(
            self::DONG      => 'Đông',
            self::TAY       => 'Tây',
            self::NAM       => 'Nam',
            self::BAC       => 'Bắc',
            self::DONG_BAC  => 'Đông bắc',
            self::TAY_BAC   => 'Tây bắc',
            self::DONG_NAM  => 'Đông nam',
            self::TAY_NAM   => 'Tây nam'
        );
    }
}
