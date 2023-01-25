<?php


namespace App\Services;


class Response
{
    public static function response($response_code = 500, $data = [])
    {
//        var_dump($response_code);die();
        header('HTTP/1.1' . $response_code . self::responseStatus($response_code));

        return json_encode($data);
    }

    protected static function responseStatus(int $code)
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
