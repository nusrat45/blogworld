@extends('layouts.app')

@section('content')
    <div>
        <div class="bg-white p-4">
            <div class="d-flex justify-content-between">
                <h5><a class="text-primary" href="/posts"><i class="fa fa-arrow-left" aria-hidden="true"></i></a></h5>
                <div>
                    @auth
                        @if(auth()->user()->id === $post->user_id)
                        <a class="mx-2 py-1 px-4 btn btn-success rounded-1" href="/posts/{{$post->id}}/edit"><i class="fa fa-edit"></i> Edit</a>

                        {{-- <a class="mx-2" href="/posts/{{$post->id}}/delete">Delete</a> --}}
                            <!-- Button trigger modal -->
                        <button type="button" class="mx-2 py-1 px-4 btn btn-danger rounded-1r" data-bs-toggle="modal" data-bs-target={{'#exampleModal'.$post->id}}>
                            <i class="fa fa-trash" aria-hidden="true"></i> Delete
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id={{'exampleModal'.$post->id}} tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header border-0">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <h1>Are you sure?</h1>
                                </div>
                                <div class="modal-footer border-0 justify-content-center pb-5">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST']) !!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('OK', ['class' => 'btn btn-danger'])}}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                            </div>
                        </div>
                        @endif
                    @endauth
                </div>
            </div>
            <h1 class="mb-4">{{$post->title}}</h1>
            <div class="d-flex align-items-center mb-4">
                <img class="rounded-img" src="/images/default_profile.jpg"/>
                <div class="mx-2">
                    <h5 class="mb-1">{{$user->name}}</h5>
                    <span><i>{{$post->created_at}}</i></span>
                </div>
            </div>
            <div class="p-2">{{$post->body}}</div>

        </div>
    </div>

@endsection