<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index()
    {
        $post = Post::cursorPaginate(5); // Eloquent ORM -> Get all Data From DataBase 

        // pass the data to the view
        return view('post.index', ['posts' => $post, 'pageTitle' => 'Blog']);
    }
    function show($id)
    {
        $post = Post::findOrFail($id);

        return view('post.show', ['post' => $post, 'pageTitle' => $post->title]);
    }
    function create()
    {
        Post::create([
           'title' => 'New Post',
           'body' => 'this body Posts',
           'author' => 'Madany',
           'published' => true
        ]);

        return redirect('/blog');
    }
}
