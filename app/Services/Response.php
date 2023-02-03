<?php

namespace App\Services;

class Response
{
    /**
     * @param int $response_code
     * @param array $data
     * @return false|string
     */
    public static function response($response_code = 500, $data = [])
    {
        header('HTTP/1.1' . $response_code . self::responseStatus($response_code));

        return json_encode($data);
    }

    /**
     * @param int $code
     * @return string
     */
    protected static function responseStatus(int $code): string
    {
        $status = [
            200 => 'OK',
            201 => 'Created',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            500 => 'Internal Server Error',
        ];

        return ($status[$code])?$status[$code]:$status[500];
    }

}
