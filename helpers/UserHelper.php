<?php

class UserHelper
{
    public static function name()
    {
        if (Auth::user()->name) {
            return Auth::user()->name;
        }
        return 'Nặc danh'; // Không tên Vô danh Không tên
    }

    public static function email()
    {
        return Auth::user()->email;
    }
}
