<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'photo',
    ];

    public function storeSlider(Object $request)
    {
        $image = $request->file('photo');
        $image_name      = date('YmdHis');
        $ext             = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name . '.' . $ext;
        $upload_path     = 'public/images/sliders/';
        $image_url       = $upload_path . $image_full_name;
        $success         = $image->move($upload_path, $image_full_name);
        $this->photo     = $image_url;
        $this->title      = $request->title;
        $storeSlider     = $this->save();

        $storeSlider
            ? session()->flash('success', 'Slider Created Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }

    public function updateSlider(Object $request, Object $slider)
    {
        $image = $request->file('photo');

        if ($image) {
            if (file_exists($slider->photo)) unlink($slider->photo);
            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/sliders/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $slider->photo   = $image_url;
        }

        $slider->title = $request->title;
        $updateSlider = $slider->save();

        $updateSlider
            ? session()->flash('success', 'Slider Updated Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }

    public function destroySlider(Object $slider)
    {
        if (file_exists($slider->photo)) unlink($slider->photo);
        $destroySlider = $slider->delete();

        $destroySlider
            ? session()->flash('success', 'Slider Deleted Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }
}
