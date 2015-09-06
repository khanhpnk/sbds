<?php

class HouseDirectionOption
{
    const DONG      = 0;
    const TAY       = 1;
    const NAM       = 2;
    const BAC       = 3;
    const DONG_BAC  = 4;
    const TAY_BAC   = 5;
    const DONG_NAM  = 6;
    const TAY_NAM   = 7;

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
