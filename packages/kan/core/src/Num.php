<?php namespace Kan\Core;

class Num
{
    /**
     *
     * @param float $number
     * @param float $precision The optional number of digits to round to
     * @return float
     */
    public static function ratio($number, $total, $precision = 2)
    {
        return round($number * 100 / $total, $precision);
    }
}