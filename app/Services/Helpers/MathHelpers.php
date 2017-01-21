<?php


namespace App\Services\Helpers;


class MathHelpers
{
    public static function div($number1, $number2) {
        if($number1 == 0 OR $number2 == 0) {
            return ;
        }

        return ($number1 / $number2) * 100;
    }
}