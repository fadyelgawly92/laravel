@extends('layouts.app')

@section('content')

<div class="container">

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form method="POST" action="update/{{$post->id}}" class="form-group">
    {{csrf_field()}}
    {{method_field('PUT')}}
        Title : <input class="form-control" type="text" name="title" value="{{$post->title}}">
        <br/>
        <br/>
        <div class="form-group">
        Descritpion : <input class="form-contol" type="text" name="description" value="{{$post->description}}">
        </div>
        <select class="form-control" name="user_id">
        @foreach($users as $user)
                <option value="{{$user->id}}" class="form-control">{{$user->name}}</option>
        @endforeach
        </select>
        <br/>
        <br/>
        <input type="submit" value="update" class="btn btn-danger">
    </form>
</div>


@endsection