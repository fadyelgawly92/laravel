@extends('layouts.app')

@section('content')
<div class="container mt-5">
<table class="table">
    <div class="text-center">
    <a href="/create"><button class="btn btn-success">Create</button></a>
    </div>
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Posted By</th>
            <th>Created At</th>
            <th>Slug</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->created_at}}</td>
                <td>{{$post->slug}}</td>
                <td><a href="/show/{{$post->id}}">
                <button class="btn btn-primary">View</button>
            </a><a href="/edit/{{$post->id}}">
            <button class="btn btn-secondary">Update</button>
        </a>
        <a  onclick="return confirm('Are you sure?')"
            href="/delete/{{$post->id}}" 
                id="warning"
                class="warning_btn">
                <button class="btn btn-warning" >Delete</button>
            </a><td>        
            </tr>

        @endforeach
    </tbody>
</table>
{{$posts->links()}}

</div>

<script>
    

</script>
@endsection