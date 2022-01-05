<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use App\Models\Page;
use App\Models\ReportCategory;
use Illuminate\Http\Request;

class ExtraController extends Controller
{
    public function newsletter()
    {
        $news = Newsletter::latest()->get();
        return view('frontend.newsletter', compact('news')); 
    }

    public function report()
    {
        $reports = ReportCategory::with('reports')->latest()->get();
        return view('frontend.report', compact('reports')); 
    }

    public function about()
    {
        $about = Page::where('id', 2)->first();
        $mission = Page::where('id', 3)->first();
        $value = Page::where('id', 4)->first();
        return view('frontend.about', compact('about', 'mission', 'value')); 
    }
}
