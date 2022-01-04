<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\General;
use App\Models\Program;

class HomeController extends Controller
{
    public function index()
    {
        $generals = General::latest()->take(3)->get();
        $programs = Program::latest()->take(2)->get();
        return view('frontend.index', compact('generals', 'programs'));
    }
}
