<?php

class ImageHelper
{
    public static function image($image, $type, $sizes)
    {
        switch ($type) {
            case 'house':
                $path = config('image.paths.house');
                break;
        }

        if (is_array($image)) {
            if (0 < count($image)) {
                return asset($path . $sizes . '-' . $image[0]);
            } else {
                return asset('images/default/' . $sizes . '.jpg');
            }
        } else {
            return asset($path . $sizes . '-' . $image);
        }
    }
}
