<?php


namespace App\Services;

use App\Http\Controllers\UsersInteractionController;

class UsersInteractionService
{
    public static function getUsersInteraction($comment, $user)
    {
        return  UsersInteractionController::getUsersInteraction($comment->id, $user->id);
    }
    public static function createUsersInteraction($comment, $user, $request) :void
    {
        $data = [
            'user_id' => $user->id,
            'comment_id' => $comment->id,
            'status' => ($request->interaction_name == 'likes') ? '1' : '-1'
        ];

        UsersInteractionController::createLikeDislike($data);
    }

    public static function updateUsersInteractionStatus($users_interaction, $status_value) :void
    {
        UsersInteractionController::edit($users_interaction->id,'status', $status_value);
    }

    public static function getStatusValue($users_interaction, $request) :string
    {
        $status_value = 0;

        if ($request->interaction_name == 'likes' && $users_interaction->status == '-1') {
            $status_value = '1';
        }
        if ($request->interaction_name == 'dislikes' && $users_interaction->status == '1') {
            $status_value = '-1';
        }

        return $status_value;
    }
}
