<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use App\Models\Comment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
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
