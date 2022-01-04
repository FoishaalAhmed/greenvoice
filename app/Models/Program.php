<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'detail', 'photo',
    ];

    public function storeProgram(Object $request)
    {
        $image = $request->file('photo');

        if ($image) {

            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/programs/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $this->photo     = $image_url;
        }

        $this->title = $request->title;
        $this->slug = $request->slug;
        $this->detail = $request->detail;
        $storeProgram  = $this->save();

        $storeProgram
            ? session()->flash('success', 'New Program Created Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }

    public function updateProgram(Object $request, Object $program)
    {
        $image = $request->file('photo');

        if ($image) {

            if (file_exists($program->photo)) unlink($program->photo);

            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/programs/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $program->photo     = $image_url;
        }

        $program->title = $request->title;
        $program->slug = $request->slug;
        $program->detail = $request->detail;
        $updateProgram  = $program->save();

        $updateProgram
            ? session()->flash('success', 'Program Updated Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }

    public function destroyProgram(Object $program)
    {
        if (file_exists($program->photo)) unlink($program->photo);
        $deleteProgram = $program->delete();

        $deleteProgram
            ? session()->flash('success', 'Program Deleted Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }
}
