@extends('layouts.app')

@section('content')
    <p>{{$title}}</p>
    <ul>
        @if (count($services) > 0)
            @foreach ($services as $service)
                <li>{{$service}}</li>
            @endforeach
        @endif

    </ul>
@endsection