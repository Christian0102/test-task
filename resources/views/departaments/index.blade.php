@extends('layouts.app')

@section('content')
<div class='container-fluid'>
    <div class="row justify-content-center">
        <div class='col-md-8'>
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <h5>Departaments </h5>
                    </div>   
                    <a href="{{route('departaments.create')}}" class="btn btn-primary float-right" style="">Add New Departaments</a>
                </div>
                @foreach($departaments as $departament)
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <img src="{{url('images/tux-g.jpg')}}" class="card-img-top" alt="image"> 
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    {{$departament->title}}
                                </div>
                                <div class="card-body">
                                    {{$departament->title}}
                                </div>
                            </div> 
                        </div>   
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">
                                    Users
                                </div> 
                                <div class="card-body">

                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <a role="button" class="btn btn-secondary" href="">Edit</a>
                        </div>
                            <form method="POST" action="#">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <div class="form-group">
                                    <input type="submit" class="btn btn-danger delete-user" value="Delete user">
                                </div>
                            </form>
                        </div>

                    </div>
                @endforeach
                </div>

            </div>
        </div>    
    </div>    


    @endsection