<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

use Carbon\Carbon;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }


    public function index()
    {
        $posts = Post::latest()
            ->filter(request()->only(['month', 'year']))
            ->get();

        return view('posts.index')->with('posts',$posts);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {

       // Create a new post using the request data



        //dd(request()->all());

       /* $post = new Post;

        $post->title = request('title');
        $post->body = request('body');

        // Save it to the database

        $post->save();*/

        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );



        // And then redirect to the home page

        return redirect('/');

    }
}
