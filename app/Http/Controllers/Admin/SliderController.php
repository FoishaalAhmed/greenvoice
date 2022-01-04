<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;

class SliderController extends Controller
{
    private $sliderObject;

    public function __construct()
    {
        $this->sliderObject = new Slider();
    }

    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('backend.admin.slider', compact('sliders'));
    }

    public function store(SliderRequest $request)
    {
        $this->sliderObject->storeSlider($request);
        return back();
    }

    public function edit(Slider $slider)
    {
        $sliders = Slider::latest()->get();
        return view('backend.admin.slider', compact('slider', 'sliders'));
    }

    public function update(SliderRequest $request, Slider $slider)
    {
        $this->sliderObject->updateSlider($request, $slider);
        return redirect()->route('admin.sliders.index');
    }

    public function destroy(Slider $slider)
    {
        $this->sliderObject->destroySlider($slider);
        return back();
    }
}
