<?php

class UserHelper
{
    public static function avatar()
    {
        if (empty(Auth::user()->avatar)) {
            return asset('images/noavatar1.jpg');
        } else {
            if (Auth::user()->provider) {
                return Auth::user()->avatar;
            } else {
                return asset(config('image.paths.avatar').Auth::user()->avatar);
            }
        }



    }

    public static function name()
    {
        if (Auth::user()->name) {
            return Auth::user()->name;
        }

        return 'Khuyết Danh';
    }

    public static function email()
    {
        if (Auth::user()->email) {
            return Auth::user()->email;
        }

        return Auth::user()->email_provider;
    }
}
