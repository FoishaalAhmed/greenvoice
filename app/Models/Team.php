<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'facebook', 'twitter', 'instagram', 'photo', 'position', 'priority', 'detail'
    ];

    public function storeTeam(Object $request)
    {
        $image = $request->file('photo');

        if ($image) {

            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/teams/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $this->photo     = $image_url;
        }

        $this->category  = $request->category;
        $this->name      = $request->name;
        $this->facebook  = $request->facebook;
        $this->twitter   = $request->twitter;
        $this->instagram = $request->instagram;
        $this->position  = $request->position;
        $this->priority  = $request->priority;
        $this->detail    = $request->detail;
        $storeTeam       = $this->save();

        $storeTeam
            ? session()->flash('success', 'New Team Member Created Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }

    public function updateTeam(Object $request, Int $id)
    {
        $team = $this::findOrFail($id);
        $image = $request->file('photo');

        if ($image) {
            if (file_exists($team->photo)) unlink($team->photo);
            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/teams/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $team->photo     = $image_url;
        }

        $team->category  = $request->category;
        $team->name      = $request->name;
        $team->facebook  = $request->facebook;
        $team->twitter   = $request->twitter;
        $team->instagram = $request->instagram;
        $team->position  = $request->position;
        $team->priority  = $request->priority;
        $team->detail  = $request->detail;
        $updateTeam      = $team->save();

        $updateTeam
            ? session()->flash('success', 'Team Member Info Updated Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }

    public function destroyTeam(Int $id)
    {
        $team = $this::findOrFail($id);
        if (file_exists($team->photo)) unlink($team->photo);
        $destroyTeam = $team->delete();

        $destroyTeam
            ? session()->flash('success', 'Team Member Deleted Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }
}
