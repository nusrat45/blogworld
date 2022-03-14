@extends('layouts.app')

@section('content')
    @auth
    <section class="recent-posts mb-5">
        <div class="caption d-flex justify-content-between">
            <span>MY POSTS</span>
        </div>
        <div class="d-flex justify-content-center p-3">
            <div class="btn btn-green px-5 rounded-1 mx-auto">
                <i class="fa fa-plus mr-2" aria-hidden="true"></i> <a href="/posts/create">Creat New Post</a>
            </div>
        </div>
        <div class="row gx-3 m-3">
            @if (count($my_posts) > 0)
                @foreach ($my_posts as $post)
                <div class="col-3">
                    <div class="card p-3 mb-3">
                        <img src="images/default_img.jpg"/>
                        <div class="card-body p-0 py-3">
                            <h3 class="card-title">{{$post->title}}</h3>
                            <p class="card-text">{{substr($post->body, 0, $mypost_min_len)}}</p>
                            <u><a class="text-primary" href="/posts/{{$post->id}}">Read More</a></u>
                        </div>
                        <div class="card-footer bg-white p-0 pt-3">
                            <div class="d-flex align-items-center mb-4">
                                {{-- <img class="rounded-img" src="/images/default_profile.jpg"/> --}}
                                <div class="mx-2">
                                    {{-- <h5 class="mb-1">{{$user->name}}</h5> --}}
                                    <span><i>{{$post->created_at}}</i></span>
                                </div>
                            </div>
                            {{-- <small class="text-muted">{{$post->created_at}}</small> --}}
                        </div>
                    </div>
                </div>
                @endforeach

            @else
                <h3 class="p-5 text-center">You don't have any posts.</h3>

            @endif
        </div>
        @if($my_post_count > 9)
            <a class="text-white" href="/posts">See All</a>
        @endif
    </section>
    @endauth


    <section class="recent-posts">
        <div class="caption d-flex justify-content-between">
            <span>RECENT POSTS</span>
        </div>
        <div class="row gx-3 m-3">
            @if (count($all_posts) > 0)
                @foreach ($all_posts as $post)
                <div class="col-3">
                    <div class="card p-3 mb-3">
                        <img src="images/default_img.jpg"/>
                        <div class="card-body p-0 py-3">
                            <h3 class="card-title">{{$post->title}}</h3>
                            <p class="card-text">{{substr($post->body, 0, $all_post_min_len)}}</p>
                            <u><a class="text-primary" href="/posts/{{$post->id}}">Read More</a></u>
                        </div>
                        <div class="card-footer bg-white p-0 pt-3">
                            <div class="d-flex align-items-center mb-4">
                                {{-- <img class="rounded-img" src="/images/default_profile.jpg"/> --}}
                                <div class="mx-2">
                                    {{-- <h5 class="mb-1">{{$user->name}}</h5> --}}
                                    <span><i>{{$post->created_at}}</i></span>
                                </div>
                            </div>
                            {{-- <small class="text-muted">{{$post->created_at}}</small> --}}
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
        @if($all_post_count > 9)
            <div class="d-flex justify-content-center p-3"><a class="btn btn-info text-white px-5 rounded-1" href="/posts">See All</a><div>
        @endif
    </section>
@endsection