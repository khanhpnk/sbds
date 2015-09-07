<?php

trait TraitJsonOption
{
    /**
     * JSON need to compatible with Select2 Plugin Jquery
     *
     * @return string JSON
     */
    public static function getJsonOptions()
    {
        $options = self::getOptions();
        $array = [];
        foreach ($options as $key => $value) {
            $array[] = ['id' => $key, 'text' =>$value];
        }

        return json_encode($array);
    }
}
