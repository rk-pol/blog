<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\User;
use App\Services\UserService;


class CommentController extends Controller
{
    public function create(CommentRequest $request)
    {
        $validated = $request->validated();

        UserController::update(UserService::getUserByIp()->id, 'username', $validated['username']);

        Comment::create([
            'comment' => $validated['comment'],
            'user_id' => User::where('ip', '=' , $_SERVER['REMOTE_ADDR'])->first()->id,
            'post_id' => $validated['id']
        ]);

        return redirect()->back();
    }

    public function delete($id)
    {
        Comment::find($id)->delete();
    }

    public static function getComment($id)
    {
        return Comment::find($id);
    }


}
