@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Posts
        </div>

    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                            <small>Written on: {{$post->created_at}}</small>
                        </div>
                        <div>
                            <a class="mx-2 py-1 px-4 btn btn-primary rounded-1" href="/posts/{{$post->id}}"><i class="fa fa-eye" aria-hidden="true"></i> View</a>

                            @auth
                            @if(auth()->user()->id === $post->user_id)
                            <a class="mx-2 py-1 px-4 btn btn-success rounded-1" href="/posts/{{$post->id}}/edit"><i class="fa fa-edit"></i> Edit</a>

                            {{-- <a class="mx-2" href="/posts/{{$post->id}}/delete">Delete</a> --}}
                               <!-- Button trigger modal -->
                            <button type="button" class="mx-2 py-1 px-4 btn btn-danger rounded-1r" data-bs-toggle="modal" data-bs-target={{'#exampleModal'.$post->id}}>
                                <i class="fa fa-trash"></i> Delete
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
                </li>
            </ul>
        @endforeach
    @endif
    </div>
@endsection