<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\President;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('teams.index', compact('teams'));
    }

    public function create()
    {
        $presidents = President::all();
        return view('teams.create', compact('presidents'));
    }

    public function store(Request $request)
    {
        Team::create($request->all());
        return redirect()->route('teams.index');
    }

    public function show(Team $team)
    {
        return view('teams.show', compact('team'));
    }

    public function edit(Team $team)
    {
        $presidents = President::all();
        return view('teams.edit', compact('team', 'presidents'));
    }

    public function update(Request $request, Team $team)
    {
        $team->update($request->all());
        return redirect()->route('teams.index');
    }

    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('teams.index');
    }
}
