<?php

namespace App\Http\Controllers;

use App\Models\UsersInteraction;

class UsersInteractionController extends Controller
{
    /**
     * @param $data
     */
    public static function createLikeDislike($data) :void
    {
        UsersInteraction::create([
            'user_id' => $data['user_id'],
            'comment_id' => $data['comment_id'],
            'status' => $data['status']
        ]);
    }

    /**
     * @param $id
     * @param $col_name
     * @param $col_value
     */
    public static function edit($id, $col_name, $col_value): void
    {
        UsersInteraction::find($id)->update([$col_name => $col_value]);
    }

    /**
     * @param $id
     */
    public function deleteLikeDislike($id) :void
    {
        UsersInteraction::find($id)->delete();
    }

    /**
     * @param $comment_id
     * @param $user_id
     * @return mixed
     */
    public static function getUsersInteraction($comment_id, $user_id): UsersInteraction
    {
        return UsersInteraction::where('comment_id', '=', $comment_id)
                                ->where('user_id', '=', $user_id)
                                ->first();
    }
}
