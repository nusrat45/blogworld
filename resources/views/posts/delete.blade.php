@extends('layouts.app')

@section('content')
    <div>Are you sure?</div>
    {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST']) !!}
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Ok', ['class' => 'btn btn-danger'])}}
    {!! Form::close() !!}
@endsection