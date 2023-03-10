<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
        return view('posts.create');
    }
    
    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => 'required',
        ]);

        auth()->user()->posts()->create($data);
        
        return redirect('/profile/'.auth()->user()->id);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

}
