<?php

namespace App\Services;

class DateFormat
{
    /**
     * @param $date_time
     * @param $formatPattern
     * @return string
     */
    public static function date_time_format($date_time, $formatPattern): string
    {
        return date_format(date_create($date_time), $formatPattern);
    }
}
