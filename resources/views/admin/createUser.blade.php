@extends('layouts.app')

@section('content')

    {!! Form::open(['action' => 'App\Http\Controllers\Admin\AdminController@store', 'method' => 'POST']) !!}
        <div class="form-group my-3">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="form-group my-3">
            {{Form::label('email', 'Email')}}
            {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'email'])}}
        </div>
        <div class="form-group my-3">
            {{Form::label('password', 'Password')}}
            {{Form::input('password', 'password', '', ['class' => 'form-control', 'placeholder' => 'Password'])}}
        </div>

        <div class="form-group my-3">
            {{Form::label('password_confirmation', 'Confirm Password')}}
            {{Form::input('password', 'password_confirmation', '', ['class' => 'form-control', 'placeholder' => 'Password'])}}
        </div>

        {{Form::submit('Create', ['class' => 'btn btn-primary'])}}
        {{link_to('/admin/dashboard', $title = 'Cancel', $attributes = ['class'=>'btn btn-danger'], $secure = null)}}
    {!! Form::close() !!}

@endsection