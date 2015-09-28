<?php

class IsSaleOption
{
    use TraitLabelOption;

    const BAN       = 0;
    const CHO_THUE  = 1;

    public static function getOptions()
    {
        return array(
            self::BAN        => 'Bán',
            self::CHO_THUE  => 'Cho thuê'
        );
    }
}
