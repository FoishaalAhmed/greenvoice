<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;

class BlogController extends Controller
{
    private $blogObject;

    public function __construct()
    {
        $this->blogObject = new Blog();
    }

    public function index()
    {
        $blogs = Blog::orderBy('date', 'desc')->get();
        return view('backend.admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('backend.admin.blogs.create');
    }

    public function store(BlogRequest $request)
    {
        $this->blogObject->storeBlog($request);
        return back();
    }

    public function edit(Blog $blog)
    {
        return view('backend.admin.blogs.edit', compact('blog'));
    }

    public function update(BlogRequest $request, Blog $blog)
    {
        $this->blogObject->updateBlog($request, $blog);
        return redirect()->route('admin.blogs.index');
    }

    public function destroy(Blog $blog)
    {
        $this->blogObject->destroyBlog($blog);
        return back();
    }
}
