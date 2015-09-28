<?php

class IsSaleUriOption
{
    use TraitLabelOption;

    const BAN       = 0;
    const CHO_THUE  = 1;

    public static function getOptions()
    {
        return array(
            self::BAN        => 'ban',
            self::CHO_THUE  => 'cho-thue'
        );
    }
}
