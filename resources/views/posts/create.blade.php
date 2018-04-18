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

    <form method="POST" action="store" class="form-group"  enctype="multipart/form-data">
    {{csrf_field()}}
        Title : <input class="form-control" type="text" name="title">
        <br/>
        <br/>
        <div class="form-group">
        Descritpion : <input class="form-contol" type="text" name="description">
        </div>
        <select class="form-control" name="user_id">
            @foreach($users as $user)
                <option value="{{$user->id}}" class="form-control">{{$user->name}}</option>
            @endforeach
        </select>
        <br/>
        <br/>
        <div class="form-group">
        <input type="file" name="img" class="form-control">
        </div>
        <br/>
        <br/>
        <input type="submit" value="create" class="btn btn-danger">
    </form>
</div>

@endsection