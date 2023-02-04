<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\PostService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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
                                                    ->paginate(12)
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


    public function getPostBySearching(Request $request)
    {
        $validated = $request->validate([
            'searched_field' => 'required|string'
        ]);

        $post = Post::where('title', 'like', '%' . $validated['searched_field'] . '%')->
                            orWhere('description', 'like', '%' . $validated['searched_field'] . '%')->first();

        return view('post', [
                        'post' => $post,
                        'recent_posts' => PostService::recent_posts($post->id),
                        'comments' => Post::find($post->id)->comments
        ]);
    }
}
