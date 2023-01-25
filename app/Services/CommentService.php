<?php


namespace App\Services;

use App\Http\Controllers\CommentController;
use App\Models\Comment;
use App\Services\UsersInteractionService;
use Illuminate\Http\Request;

class CommentService
{
    public static function checkUsersInteraction(Request $request) : array
    {
        $user = UserService::getUserByIp();
        $comment = CommentController::getComment($request->id);
        $users_interaction = UsersInteractionService::getUsersInteraction($comment, $user);

        if ($users_interaction) {
            $new_status_value = UsersInteractionService::getStatusValue($users_interaction, $request);

            if ($new_status_value == '1') {
               $decrement_col_name = 'dislikes';
               $increment_col_name = 'likes';
            }

            if ($new_status_value == '-1') {
                $decrement_col_name = 'likes';
                $increment_col_name = 'dislikes';
            }

            if ($new_status_value != '0') {
                self::decrementLikesDislikes($request->id, $decrement_col_name);
                self::incrementLikesDislikes($request->id, $increment_col_name);
                UsersInteractionService::updateUsersInteractionStatus($users_interaction, $new_status_value);
            }

        } else {
            UsersInteractionService::createUsersInteraction($comment, $user, $request);
            self::incrementLikesDislikes($request->id, $request->interaction_name);
        }

        return self::getAmountOfLikesDislikes($request->id);
    }

    public static function incrementLikesDislikes($comment_id, $col_name) :void
    {
        CommentController::getComment($comment_id)->increment($col_name);
    }

    public static function decrementLikesDislikes($comment_id, $col_name) :void
    {
        CommentController::getComment($comment_id)->decrement($col_name);
    }

    public static function getAmountOfLikesDislikes($comment_id) :array
    {
        $amount_of_likes_dislikes = [
            'total_likes' => self::getAmountOfLikes($comment_id),
            'total_dislikes' => self::getAmountOfDislikes($comment_id)
        ];

        return $amount_of_likes_dislikes;
    }

    protected static function getAmountOfLikes($comment_id)
    {
        return Comment::find($comment_id)->likes;
    }

    protected static function getAmountOfDislikes($comment_id)
    {
        return Comment::find($comment_id)->dislikes;
    }


}
