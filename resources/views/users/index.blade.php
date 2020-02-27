@extends('layouts.app')

@section('content')
<div class="wrapper">
    @if(Session::has('success'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('success') !!}</em></div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row ">
                            <div class="col-md-12">
                                <h2>Users</h2>
                                <a href="{{ route('users.create') }}" role="button" class="btn btn-primary">Add User</a>
                            </div>
                        </div>    
                        <div class="card-body">

                            <table class="table table-bordered" id="laravel">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Created at</th>
                                        <th>Edit Action</th>
                                        <th>Delete Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ date('d m Y', strtotime($user->created_at)) }}</td>
                                        <td><a href="{{ route('users.edit',['user'=>$user->id]) }}" role="button" class="btn btn-secondary">Edit</a></td>
                                        <td>
                                            <form method="POST" action="/users/{{$user->id}}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-danger delete-user" value="Delete user">
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $users->links() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endsection

