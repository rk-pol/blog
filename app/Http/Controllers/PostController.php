<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\PostService;
use Illuminate\Contracts\View\View;

class PostController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        return view('posts');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     */
    public function posts(): View
    {
        return view('posts', [ 'posts' => Post::select('*')
                                                    ->orderBy('created_at', 'desc')
                                                    ->paginate(10)
        ]);
    }

    /**
     * @param $id
     * @return View
     */
    public function post($id): View
    {
        return view('post', [
                            'post' => Post::find($id),
                            'recent_posts' => PostService::recent_posts($id),
                            'comments' => Post::find($id)->comments
        ]);

    }

}
