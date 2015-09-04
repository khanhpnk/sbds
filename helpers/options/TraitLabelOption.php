<?php

trait TraitLabelOption
{
    public static function getLabel($type)
    {
        $options = self::getOptions();
        return $options[$type];
    }
}
