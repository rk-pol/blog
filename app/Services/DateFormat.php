<?php

namespace App\Services;

class DateFormat
{
    public static function date_time_format($date_time, $formatPattern)
    {
        return date_format(date_create($date_time), $formatPattern);
    }
}
