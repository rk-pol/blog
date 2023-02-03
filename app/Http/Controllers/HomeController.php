<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use App\Models\Comment;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        $options = [
            'orderByField' => 'created_at',
            'orderOpt' => 'desc',
            'limit' => '3'
        ];

        return view('dashboard', [
                                    'lastedPosts' => PostService::recent_posts($options),
                                    'last_comments'=> Comment::orderBy('created_at', 'desc')->limit('5')->get()
                                ]
        );
    }
}
