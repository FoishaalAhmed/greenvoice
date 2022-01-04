<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'date', 'title', 'slug', 'writer', 'content', 'photo',
    ];

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = date('Y-m-d', strtotime($value));
    }

    public function getDateAttribute($value)
    {
        return date('d M, Y', strtotime($value));
    }

    public function storeBlog(Object $request)
    {
        $image = $request->file('photo');

        if ($image) {

            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/blogs/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $this->photo     = $image_url;
        }

        $this->title = $request->title;
        $this->date = $request->date;
        $this->writer = $request->writer;
        $this->slug = $request->slug;
        $this->content = $request->content;
        $storeBlog  = $this->save();

        $storeBlog
            ? session()->flash('success', 'New Blog Created Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }

    public function updateBlog(Object $request, Object $blog)
    {
        $image = $request->file('photo');

        if ($image) {

            if (file_exists($blog->photo)) unlink($blog->photo);

            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/blogs/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $blog->photo     = $image_url;
        }

        $blog->title = $request->title;
        $blog->date = $request->date;
        $blog->writer = $request->writer;
        $blog->slug = $request->slug;
        $blog->content = $request->content;
        $updateBlog  = $blog->save();

        $updateBlog
            ? session()->flash('success', 'Blog Updated Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }

    public function destroyBlog(Object $blog)
    {
        if (file_exists($blog->photo)) unlink($blog->photo);
        $deleteBlog = $blog->delete();

        $deleteBlog
            ? session()->flash('success', 'Blog Deleted Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }
}
