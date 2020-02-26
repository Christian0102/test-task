@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <form method="POST" action="{{route('users.update',['user'=>$user->id])}}" >
        {{method_field('PATCH')}}
        @csrf
        <div class="form-group col-md-4">
            <label for="User Name">User Name</label>
            <input type="text" class="form-control" name="name" id="username"   aria-describedby="username" value="{{$user->name}}" placeholder="User Name" >
            @if ($errors->has('name'))

            <span class="text-danger">{{ $errors->first('name') }}</span>

            @endif
        </div>
        <div class="form-group col-md-4">
            <label for="email">Email address</label>
            <input type="email" class="form-control"  name="email" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->email}}" placeholder="Enter email">
            @if ($errors->has('name'))

            <span class="text-danger">{{ $errors->first('email') }}</span>

            @endif
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputPassword1">Password</label>
            <input type="text" name="password" class="form-control" id="password" value="{{Crypt::decrypt($user->password)}}" placeholder="Password">
            @if ($errors->has('name'))

            <span class="text-danger">{{ $errors->first('password') }}</span>

            @endif
        </div>
        <div class="form-groupm col-md-4">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection