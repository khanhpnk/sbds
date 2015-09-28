<?php

class UserHelper
{
    public static function avatar()
    {
        $directory = config('image.paths.avatar');

        if (empty(Auth::user()->avatar)) {
            return asset($directory . '/default/avatar.jpg');
        } else {
            if (Auth::user()->provider) {
                return Auth::user()->avatar;
            } else {
                return asset($directory.'/'.Auth::user()->avatar);
            }
        }
    }

    public static function name()
    {
        return (Auth::user()->name) ? Auth::user()->name : 'Khuyết Danh';
    }

    public static function email()
    {
        return (Auth::user()->email) ? Auth::user()->email : Auth::user()->email_provider;
    }
}
