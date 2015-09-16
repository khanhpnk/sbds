<?php

class MessageHelper
{
    public static function isInbox()
    {
        if (Request::is("m/message/f/inbox")) {
            return true;
        } else {
            return false;
        }
    }

    public static function dateFormat($value)
    {
        return date_format($value, '\N\g\à\y d \t\h\á\n\g m, Y');
    }
}
