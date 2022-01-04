<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'detail', 'photo',
    ];

    public function storeProject(Object $request)
    {
        $image = $request->file('photo');

        if ($image) {

            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/projects/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $this->photo     = $image_url;
        }

        $this->title = $request->title;
        $this->slug = $request->slug;
        $this->detail = $request->detail;
        $storeProject  = $this->save();

        $storeProject
            ? session()->flash('success', 'New Project Created Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }

    public function updateProject(Object $request, Object $project)
    {
        $image = $request->file('photo');

        if ($image) {

            if (file_exists($project->photo)) unlink($project->photo);

            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/projects/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $project->photo     = $image_url;
        }

        $project->title = $request->title;
        $project->slug = $request->slug;
        $project->detail = $request->detail;
        $updateProject  = $project->save();

        $updateProject
            ? session()->flash('success', 'Project Updated Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }

    public function destroyProject(Object $project)
    {
        if (file_exists($project->photo)) unlink($project->photo);
        $deleteProject = $project->delete();

        $deleteProject
            ? session()->flash('success', 'Project Deleted Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }
}
