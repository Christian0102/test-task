@extends('layouts.app')
@section('content')
<div class="container-fluid">
        <form action="{{route('departaments.update',$departament->id)}}" method="POST" enctype="multipart/form-data">
            {{method_field('PATCH')}}
            @csrf
            <div class="form-group col-md-6">
                <label for="title">Title:</label>
                <input type="text" class="form-control" placeholder="Enter Title" name="title" id="title-departaments" value="{{$departament->title}}" required>
            </div>
            <div class="form-group col-md-6">
                <label for="pwd">Description:</label>
                <textarea class="form-control" name="description" placeholder="Enter Description" id="pwd" required>{{$departament->description}}</textarea>
            </div>
            <div class="form-group col-md-6">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="file" id="inputGroupFile04">
                    <label class="custom-file-label" for="inputGroupFile04">Choose Logo</label>
                </div>
            </div>
            <div class="form-group col-md-6">
                @foreach($users as $user)
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="user_id[]" value="{{$user->id}}" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">{{$user->name}}</label>
                </div>
                @endforeach()
            </div>  

            <button type="submit" class="btn btn-primary">Submit</button>
        </form> 
</div>
@endsection