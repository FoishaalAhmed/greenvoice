<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Program;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::latest()->paginate(8);
        return view('frontend.program', compact('programs'));
    }

    public function show($id, $slug)
    {
        $program = Program::findOrFail($id);
        return view('frontend.programdetail', compact('program'));
    }
}
