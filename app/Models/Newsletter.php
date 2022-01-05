<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'file',
    ];

    public function storeNewsletter(Object $request)
    {
        $image = $request->file('file');
        $image_name      = date('YmdHis');
        $ext             = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name . '.' . $ext;
        $upload_path     = 'public/images/newsletters/';
        $image_url       = $upload_path . $image_full_name;
        $success         = $image->move($upload_path, $image_full_name);
        $this->file     = $image_url;
        $this->title = $request->title;
        $storeNewsletter = $this->save();

        $storeNewsletter
            ? session()->flash('success', 'New Newsletter Created Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }

    public function updateNewsletter(Object $request, Object $newsletter)
    {
        $image = $request->file('file');

        if ($image) {
            if (file_exists($newsletter->file)) unlink($newsletter->file);
            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/newsletters/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $newsletter->file     = $image_url;
        }

        $newsletter->title = $request->title;
        $updateNewsletter = $newsletter->save();

        $updateNewsletter
            ? session()->flash('success', 'Newsletter Updated Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }

    public function destroyNewsletter(Object $newsletter)
    {
        if (file_exists($newsletter->file)) unlink($newsletter->file);
        $destroyNewsletter = $newsletter->delete();

        $destroyNewsletter
            ? session()->flash('success', 'Newsletter Deleted Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }
}
