<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
   public function index()
    {
        return view('posts.index');
    }

    public function show()
    {
        return view('posts.show');
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

        Post::create(request(['title', 'body']));

        // And then redirect to the home page

        return redirect('/');

    }
}
