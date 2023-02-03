<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    /**
     * @param $id
     * @return mixed
     */
    public static function getUserById($id): User
    {
        return User::find($id);
    }

    /**
     * @return mixed
     */
    public static function getUserByIp(): User
    {
        return User::where('ip', '=', self::getUsersIp())->first();
    }

    /**
     * @return mixed
     */
    public static function getUsersIp(): string
    {
        return $_SERVER['REMOTE_ADDR'];
    }
}
