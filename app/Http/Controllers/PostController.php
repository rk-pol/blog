<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\UsersInteraction;
use App\Services\DateFormat;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts');
    }

    public function posts()
    {
        return view('posts', [
                                'posts' => Post::select('*')
                                                    ->orderBy('created_at', 'desc')
                                                    ->paginate(10)
        ]);
    }

    public function post($id)
    {
        return view('post', [
                                'post' => Post::find($id),
                                'recent_posts' => PostService::recent_posts($id),
                                'comments' => Post::find($id)->comments
                            ]
        );

    }

}
