<?php

namespace App\Services;

class Utils
{
    public static function intFormat($value)
    {
        return str_replace(',', '.', number_format($value));
    }
}
