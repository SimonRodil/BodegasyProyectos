<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::latest()->get();
        return view('blog.index', compact('posts'));
    }

    public function show()
    {
        $post = BlogPost::findOrFail(request('id'));
        return view('blog.show', compact('post'));
    }
}
