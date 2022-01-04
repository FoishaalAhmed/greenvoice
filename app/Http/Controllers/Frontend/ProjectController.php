<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(8);
        return view('frontend.project', compact('projects'));
    }

    public function show($id, $slug)
    {
        $project = Project::findOrFail($id);
        return view('frontend.projectdetail', compact('project'));
    }
}
