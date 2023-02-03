<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    /**
     * @param $id
     * @param $col_name
     * @param $col_value
     */
    public static function update($id, $col_name, $col_value): void
    {
        User::find($id)->update([$col_name => $col_value]);
    }
}
