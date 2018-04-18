<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StorePostRequest ;
// use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(3);
        // $contents = Storage::get($posts->image);
        // $pages = DB::table('posts')->paginate(5);
        return view('posts.index',[
            'posts' => $posts,
            // 'contents' => $contents
            // 'pages' => $pages
        ]);
    } 

    public function create(){
        $users = User::all();
        return view('posts.create',[
            'users' => $users
        ]);
    }

    public function store(StorePostRequest $request)
    {
        $path = Storage::putFile('uploads', $request->file('img'));
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'image' => $path
        ]);
        return Redirect(route('posts.index'));
    }

    public function show($id)
    {
        return view('posts.review',[
            'post' => Post::findorFail($id)
        ]);
    }

    public function edit($id)
    {
        $users = User::all();
        return view ('posts.edit',[
            'post' => Post::findorFail($id),
            'users' => $users   
        ]);
    }

    public function update(StorePostRequest $request , $id)
    {
        $path = Storage::putFile('uploads', $request->file('img'));
        Post::where('id',$id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'photo' => $path
        ]);
        // $post = Post::findorFail($id);
        // post::update([
        //     $post->title = $request->title,
        //     $post->description = $request->description,
        //     $post->user_id = $request->user_id
        // ]);
         return Redirect(route('posts.index'));
        // dd("welcome");
    }

    public function delete($id)
    {
        Post::where('id',$id)->delete();
        return Redirect(route('posts.index'));
    }
}
