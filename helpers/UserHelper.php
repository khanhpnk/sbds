<?php

class UserHelper
{
    public static function avatar()
    {
        if (Auth::user()->avatar) {
            return Auth::user()->avatar;
        }

        return asset('images/noavatar1.jpg');
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
