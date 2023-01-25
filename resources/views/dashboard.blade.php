@extends('layouts.index')

@section('content')
    <section class="main dashboard">
        <div class="background-img hero-image">
            <h1>This is my blog</h1>
        </div>
        <div class="dashboard__new">
            <div class="new-title">
                <hr>
                <h1>News</h1>
                <hr>
            </div>
            <div class="new-articles-wrap">
                <div class="new-articles">
                    @foreach($lastedPosts as $post)
                        <a href="/post/{{ $post->id }}">
                            <div class="new-articles__article">
                                <img src="{{ asset($post->image_path) }}" alt="" class="news-img">
                                <h1>{{ Str::limit($post->title, 15) }}</h1>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="dashboard__last-comments">
            <div class="last-comments-title">
                <hr>
                <h1>Last comments</h1>
                <hr>
            </div>
            <div class="last-comments-swiper">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @foreach($last_comments as $last_comment)
                        <div class="swiper-slide comment-swiper-wrap">
                            <div class="comment-swiper-title">
                                <a href="/post/{{ $last_comment->post->id }}">
                                    <h1>{{ Str::limit($last_comment->post->title, 20) }}</h1>
                                </a>
                                <hr>
                            </div>
                            <div class="comment-swiper-text">
                                <p>{{ Str::limit($last_comment->comment, 250) }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard__addition-info">
            <div class="addition-info-title">
                <hr>
                <h1>Addition information</h1>
                <hr>
            </div>
            <div class="addition-info__text">
                <div class="text-part text-first-part-wrap">
                    <div class="text-first-part">
                        <h2>Title part one</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum delectus esse harum nobis porro? At ducimus facilis, itaque maxime modi quo quos unde! Accusamus distinctio pariatur quisquam quos sed sint.
                        </p>
                    </div>

                    <img src="{{ asset('/images/placeholder.jpg') }}" alt="" class="text-part-img tpimage-f">
                </div>
                <div class="text-part text-second-part-wrap">
                    <img src="{{ asset('/images/placeholder.jpg') }}" alt="" class="text-part-img tpimage-s">
                    <div class="text-second-part">
                        <h2>Title part two</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum delectus esse harum nobis porro? At ducimus facilis, itaque maxime modi quo quos unde! Accusamus distinctio pariatur quisquam quos sed sint.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
