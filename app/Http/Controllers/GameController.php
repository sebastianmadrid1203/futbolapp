<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return view('games.index', compact('games'));
    }

    public function create()
    {
        $teams = Team::all();
        return view('games.create', compact('teams'));
    }

    public function store(Request $request)
    {
        $game = Game::create($request->all());
        if ($request->has('teams')) {
            $game->teams()->attach($request->teams);
        }
        return redirect()->route('games.index');
    }

    public function show(Game $game)
    {
        return view('games.show', compact('game'));
    }

    public function edit(Game $game)
    {
        $teams = Team::all();
        return view('games.edit', compact('game', 'teams'));
    }

    public function update(Request $request, Game $game)
    {
        $game->update($request->all());
        if ($request->has('teams')) {
            $game->teams()->sync($request->teams);
        }
        return redirect()->route('games.index');
    }

    public function destroy(Game $game)
    {
        $game->teams()->detach();
        $game->delete();
        return redirect()->route('games.index');
    }
}
