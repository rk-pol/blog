@extends('layouts.index')

@section('content')
    <section class="main posts-wrap">
        <div class="posts-title">
            <h2>All my stories</h2>
        </div>
        <div class="posts">
            @foreach($posts as $post)
                <div class="post">
                    <div>
                        <img src="{{ $post->image_path }}" alt="Post image" class="post-img">
                    </div>
                    <div class="post-info">
                        <div class="post-info-time">
                            <span class="post-info-time-text">{{ $post->created_at }}</span>
                        </div>
                        <a href="post/{{ $post->id }}">
                            <h2 class="post-info-title">{{ $post->title }}</h2>
                        </a>
                        <p class="post-info-description">{{ Str::limit($post->description, 200) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <hr>
        <div class="pagination-wrap">

            <div>
                Showing {{ $posts->firstItem() }} - {{ $posts->lastItem() }} of {{ $posts->total() }}
            </div>
            <div>
                {{ $posts->links() }}
            </div>

        </div>
    </section>
@endsection
