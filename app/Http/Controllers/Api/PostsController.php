<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Http\Resources\PostResource;
use App\Http\Requests\StorePostRequest;

class PostsController extends Controller
{
    public function index()
    {   
        $posts= Post::with('user')->paginate(2);
        return PostResource::collection($posts);
    }
    
    public function store(StorePostRequest $request)
    {
        // dd($request->all());
        $posts = Post::create($request->all());
        return new PostResource($posts);
    }
}
