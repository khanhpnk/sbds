<?php

class CompanyHelper
{
    public static function avatar($avatar = '')
    {
        $endpoint = url('upload');
        $path = config('image.paths.company');

        if (empty($avatar)) {
            return "{$endpoint}/{$path}/default/avatar.jpg";
        } else {
            return "{$endpoint}/{$path}/{$avatar}" ;
        }
    }
}
