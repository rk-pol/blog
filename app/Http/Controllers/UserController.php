<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public static function update($id, $col_name, $col_value)
    {
        User::find($id)->update([$col_name => $col_value]);
    }
}
