<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(8);
        return view('frontend.blog', compact('blogs'));
    }

    public function show($id, $slug)
    {
        $blog = Blog::findOrFail($id);
        return view('frontend.blogdetail', compact('blog'));
    }
}
