<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('category')) {
            $teams = Team::where('category', $request->category)->orderBy('priority', 'asc')->paginate(16);
        } else {
            $teams = Team::orderBy('priority', 'asc')->paginate(16);
        }

        return view('frontend.team', compact('teams'));
    }

    public function detail($id, $name)
    {
        $team = Team::findOrFail($id);
        return view('frontend.teamDetail', compact('team'));
    }
}
