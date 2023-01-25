<?php

namespace App\Http\Controllers;

use App\Models\UsersInteraction;

class UsersInteractionController extends Controller
{
    public static function createLikeDislike($data) :void
    {
        UsersInteraction::create([
            'user_id' => $data['user_id'],
            'comment_id' => $data['comment_id'],
            'status' => $data['status']
        ]);
    }

    public static function edit($id, $col_name, $col_value)
    {
        UsersInteraction::find($id)->update([$col_name => $col_value]);
    }

    public function deleteLikeDislike($id) :void
    {
        UsersInteraction::find($id)->delete();
    }

    public static function getUsersInteraction($comment_id, $user_id)
    {
        return UsersInteraction::where('comment_id', '=', $comment_id)
                                ->where('user_id', '=', $user_id)
                                ->first();
    }
}
