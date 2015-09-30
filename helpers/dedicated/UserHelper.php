<?php

class UserHelper
{
    public static function avatar()
    {
        $directory = config('filesystems.disks.s3.endpoint');
        $path = config('image.paths.user');
        $user = Auth::user();

        if (empty($user->avatar)) {
            return "{$directory}/{$path}default/avatar.jpg";
        } else {
            if ($user->provider) {
                return $user->avatar;
            } else {
                return "{$directory}/{$path}{$user->avatar}";
            }
        }
    }

    public static function name()
    {
        $user = Auth::user();
        return ($user->name) ? $user->name : 'Khuyết Danh';
    }

    public static function email()
    {
        $user = Auth::user();
        return ($user->email) ? $user->email : $user->email_provider;
    }
}
