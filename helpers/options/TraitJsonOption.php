<?php

trait TraitJsonOption
{
    public static function getJsonOptions()
    {
        $options = self::getOptions();
        return json_encode($options);
    }
}
