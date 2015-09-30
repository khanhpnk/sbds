<?php

class CompanyHelper
{
    public static function avatar($avatar = '')
    {
        $directory = config('filesystems.disks.s3.endpoint');
        $path = config('image.paths.company');

        if (empty($avatar)) {
            return "{$directory}/{$path}default/avatar.jpg";
        } else {
            return "{$directory}/{$path}{$avatar}" ;
        }
    }
}
