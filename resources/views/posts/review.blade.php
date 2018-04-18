@extends('layouts.app')

@section('content')
 
<div class="container">
<form>
    <fieldset>
        <legend></legend>
    <h1><div class="form-group">Post Info</div></h1>
    <div class="form-group">
        <h3>title : {{$post->title}}</h3>
        <h3>Description is : {{$post->description}}</h3>
    </div>
    </fieldset>
</form>

<form>
    <fieldset>
    <legend></legend>
    <h1><div class="form-group">Post creator Info</div></h1>    
    <div class="form-group">
        <h3>Name : {{$post->user->name}}</h3>
        <h3>Email : {{$post->user->email}}</h3>
        <h3>Created At : {{$post->created_at->format('l jS \\of F Y h:i:s A')}}</h3>
        <img src="{{url('storage/'.$post->image)}}">
    </div>
    </fieldset>
</form>
</div>
@endsection