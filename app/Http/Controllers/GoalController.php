<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goal;
use App\Models\Player;
use App\Models\Game;

class GoalController extends Controller
{
    public function index()
    {
        $goals = Goal::with(['player', 'game'])->get();
        return view('goals.index', compact('goals'));
    }

    public function create()
    {
        $players = Player::all();
        $games = Game::all();
        return view('goals.create', compact('players', 'games'));
    }

    public function store(Request $request)
    {
        Goal::create($request->all());
        return redirect()->route('goals.index');
    }

    public function show(Goal $goal)
    {
        return view('goals.show', compact('goal'));
    }

    public function edit(Goal $goal)
    {
        $players = Player::all();
        $games = Game::all();
        return view('goals.edit', compact('goal', 'players', 'games'));
    }

    public function update(Request $request, Goal $goal)
    {
        $goal->update($request->all());
        return redirect()->route('goals.index');
    }

    public function destroy(Goal $goal)
    {
        $goal->delete();
        return redirect()->route('goals.index');
    }
}
