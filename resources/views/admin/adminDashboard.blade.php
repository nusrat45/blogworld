@extends('layouts.app')

@section('content')
    <div class="btn btn-green mb-4"><i class="fa fa-plus mr-2" aria-hidden="true"></i> <a href="/users/create">Add User</a></div>
    <div class="card">
        <div class="card-header">
            users
        </div>

    @if (count($users) > 0)
        @foreach ($users as $user)
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3><a href="/users/{{$user->id}}">{{$user->name}}</a></h3>
                            <h6>{{$user->email}}</h6>
                        </div>
                        <div>
                            {{-- <a class="mx-2 py-1 px-4 btn btn-primary rounded-1" href="/users/{{$user->id}}"><i class="fa fa-eye" aria-hidden="true"></i> View</a> --}}

                            @auth
                            {{-- @if(auth()->user()->id === $user->user_id) --}}
                            <a class="mx-2 py-1 px-4 btn btn-success rounded-1" href="/users/{{$user->id}}/edit"><i class="fa fa-edit"></i> Edit</a>

                            {{-- <a class="mx-2" href="/users/{{$user->id}}/delete">Delete</a> --}}
                               <!-- Button trigger modal -->
                            <button type="button" class="mx-2 py-1 px-4 btn btn-danger rounded-1r" data-bs-toggle="modal" data-bs-target={{'#exampleModal'.$user->id}}>
                                <i class="fa fa-trash"></i> Delete
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id={{'exampleModal'.$user->id}} tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        {!! Form::open(['action' => ['App\Http\Controllers\Admin\AdminController@destroy', $user->id], 'method' => 'user']) !!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('OK', ['class' => 'btn btn-danger'])}}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                                </div>
                            </div>
                            {{-- @endif --}}
                            @endauth
                        </div>
                    </div>
                </li>
            </ul>
        @endforeach
    @endif
    </div>
@endsection