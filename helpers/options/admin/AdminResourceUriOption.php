<?php

class AdminResourceUriOption
{
    use TraitLabelOption;

    const CHINH_CHU = 0;
    const MOI_GIOI = 1;
    const DU_AN = 2;

    public static function getOptions()
    {
        return array(
            self::CHINH_CHU => 'chinh-chu',
            self::MOI_GIOI  => 'moi-gioi',
            self::DU_AN => 'du-an'
        );
    }
}
