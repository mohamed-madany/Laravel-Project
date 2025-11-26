<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    function index()
    {
        $data = Comment::all(); // Eloquent ORM -> Get all Data From DataBase 

        // pass the data to the view
        return view('comment.index', ['comments' => $data, 'pageTitle' => 'Comments']);
    }
    function create()
    {
        $post = Comment::create([
            'author' => 'Mohamed',
            'content' => 'this content test Comment',
            'post_id' => 2,
        ]);

        return redirect('/comments');
    }
}
