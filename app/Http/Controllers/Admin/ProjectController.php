<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;

class ProjectController extends Controller
{
    private $projectObject;

    public function __construct()
    {
        $this->projectObject = new Project();
    }

    public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')->get();
        return view('backend.admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('backend.admin.projects.create');
    }

    public function store(ProjectRequest $request)
    {
        $this->projectObject->storeProject($request);
        return back();
    }

    public function edit(Project $project)
    {
        return view('backend.admin.projects.edit', compact('project'));
    }

    public function update(ProjectRequest $request, Project $project)
    {
        $this->projectObject->updateProject($request, $project);
        return redirect()->route('admin.projects.index');
    }

    public function destroy(Project $project)
    {
        $this->projectObject->destroyProject($project);
        return back();
    }
}
