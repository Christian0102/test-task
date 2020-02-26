@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <form method="POST" action="{{route('users.store')}}" >
        {{method_field('post')}}
        @csrf
       @include('users.form')
    </form>
</div>
@endsection