<?php

class ImageHelper
{
    public static function image($image, $userId, $type, $sizes)
    {
        switch ($type) {
            case 'house':
                $path = url('upload/'.config('image.paths.house').'/'.$userId);
                break;
        }

        if (is_array($image)) { // get first image for list
            if (0 < count($image)) {
                return asset($path.'/'.$sizes.$image[0]);
            } else {
                return asset("upload/$type/default/$sizes.jpg");
            }
        } else { // indicate a image
            return asset($path.'/'.$sizes.$image);
        }
    }

    public static function avatar($avatar = '')
    {
        $directory = config('filesystems.disks.s3.endpoint');

        if (!$avatar) {
            return $directory . '/company/default/avatar.jpg';
        } else {
            return $directory.'/company/'.$avatar;
        }
    }
}
