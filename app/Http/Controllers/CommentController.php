<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;


class CommentController extends Controller
{
    /**
     * @param CommentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(CommentRequest $request): RedirectResponse
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

    /**
     * @param $id
     */
    public function delete($id): void
    {
        Comment::find($id)->delete();
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function getComment($id)
    {
        return Comment::find($id);
    }


}
