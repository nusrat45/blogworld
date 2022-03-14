@extends('layouts.app')

@section('content')

    {!! Form::open(['action' => ['App\Http\Controllers\PostsController@update', $post->id], 'method' => 'POST']) !!}
        <div class="form-group my-3">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'title'])}}
        </div>
        <div class="form-group my-3">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', $post->body, ['class' => 'form-control', 'placeholder' => 'Body'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
        {{link_to(URL::previous(), $title = 'Cancel', $attributes = ['class'=>'btn btn-danger'], $secure = null)}}
    {!! Form::close() !!}

@endsection