<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    
    public function allPosts()
    {
        return view('blog.index');
    }

    public function dashboard()
    {
        return view('blog.dashboard');
    }

    public function createPost()
    {
        return view('blog.create');
    }

    public function savePost(Request $request)
    {

    }
}
