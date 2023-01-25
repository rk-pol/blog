@extends('layouts.index')

@section('content')
    <section class="main current-post-wrap">
        <div class="current-post">
            <div class="current-post-info-time">
                <span class="current-post-info-time-text">{{ date_format(date_create($post->created_at), 'j F y') }}</span>
            </div>
            <div class="current-post-title">
                <hr>
                <h1 class="current-post-title-text">{{ $post->title }}</h1>
                <hr>
            </div>
            <div class="current-post-img">
                <img src="{{ asset($post->image_path) }}" alt="">
            </div>
            <div class="current-post-description">
                <p>{{ $post->description }}</p>
            </div>
        </div>
        <div class="recent-posts-wrap">
            <hr>
            <div class="recent-posts-wrap-title">
                <h2 class="recent-posts-wrap-title-text">Recent posts</h2>
                <a href="/posts">See all</a>
            </div>
            <hr>
            <div class="recent-posts">
                @foreach($recent_posts as $recent_post)
                    <div class="recent-post">
                        <img src="{{ asset($recent_post->image_path) }}" alt="">
                        <a href="/post/{{ $recent_post->id }}"><h2>{{ Str::limit($recent_post->title, 25) }}</h2></a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="user-comments-wrap">
            <div class="comments-wrap-title">
                <hr>
                <h2 class="comments-wrap-title-text">Comments</h2>
                <hr>
            </div>
            <div class="comments-wrap">
                <div class="new-comment-wrap">
                    <form action="/create_comment" class="new-comment" method="post">
                        @csrf
                        <input type="text" placeholder="Name" name="username" class="new-comment-username" required minlength="2">
                        <textarea placeholder="Comment" class="new-comment-textarea" name="comment" required minlength="20"></textarea>
                        <input type="submit" class="btn btn-send-comment" value="Send">
                        <input type="hidden" name="id" value="{{ $post->id }}">
                    </form>

                        <div class="comments">
                            @foreach($comments as $comment)
                            <div class="comment-wrap">
                                <div class="comment-user-wrap">
                                    <span class="comment-user-wrap-name">{{ $comment->user->name }}:</span>
                                    <span class="comment-user-wrap-date">{{ date_format($comment->created_at, 'Y-m-d') }}</span>
                                </div>
                                <div class="comment-user-text">
                                    {{ $comment->comment }}
                                </div>
                                <div class="comment-interaction">
                                    <div class="comment-interaction-likes-dislikes">
                                        <div class="comment-interaction-like">
                                            <span>{{ $comment->likes }}</span> @svg('like')
                                            <input type="hidden" name="interaction_name" value="likes">
                                        </div>
                                        <div class="comment-interaction-dislike">
                                            @svg('dislike') <span>{{ $comment->dislikes }}</span>
                                            <input type="hidden" name="interaction_name" value="dislikes">
                                        </div>
                                    </div>
                                    <div class="comment-interaction-repost-wrap">
                                        <div class="comment-interaction-repost">
                                            @svg('repost')
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" value="{{ $comment->id }}" data_id="id_{{ $comment->id }}">
                                </div>
                            </div>
                            @endforeach
                        </div>
                </div>
            </div>
        </div>

    </section>
@endsection
