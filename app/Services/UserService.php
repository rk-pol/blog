<?php


namespace App\Services;


use App\Models\User;

class UserService
{
    protected $user;

    public static function getUserById($id)
    {
        return User::find($id);

    }

    public static function getUserByIp()
    {
        return User::where('ip', '=', self::getUsersIp())->first();
    }
    public static function getUsersIp()
    {
        return $_SERVER['REMOTE_ADDR'];
    }
}
