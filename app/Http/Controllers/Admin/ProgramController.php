<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProgramRequest;
use App\Models\Program;

class ProgramController extends Controller
{
    private $programObject;

    public function __construct()
    {
        $this->programObject = new Program();
    }

    public function index()
    {
        $programs = Program::orderBy('created_at', 'desc')->get();
        return view('backend.admin.programs.index', compact('programs'));
    }

    public function create()
    {
        return view('backend.admin.programs.create');
    }

    public function store(ProgramRequest $request)
    {
        $this->programObject->storeProgram($request);
        return back();
    }

    public function edit(Program $program)
    {
        return view('backend.admin.programs.edit', compact('program'));
    }

    public function update(ProgramRequest $request, Program $program)
    {
        $this->programObject->updateProgram($request, $program);
        return redirect()->route('admin.programs.index');
    }

    public function destroy(Program $program)
    {
        $this->programObject->destroyProgram($program);
        return back();
    }
}
