

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrmController;
use App\Http\Controllers\PresidentController;   
use App\Http\Controllers\TeamController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PlayerController;       
use App\Http\Controllers\GoalController;
use App\Http\Controllers\HomeController;


//Route::get('/consultas', [OrmController::class, 'consultas']);


Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('login', [HomeController::class, 'showLogin'])->name('login');
Route::post('login', [HomeController::class, 'login']);
Route::get('register', [HomeController::class, 'showRegister'])->name('register');
Route::post('register', [HomeController::class, 'register']);
Route::post('logout', [HomeController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {

    Route::resource('presidents', PresidentController::class);

    Route::resource('teams', TeamController::class);
    
    Route::resource('players', PlayerController::class);

    Route::resource('games', GameController::class);
    
    Route::resource('goals', GoalController::class);
});

Route::get('teams', [TeamController::class, 'index'])->name('teams.index');
Route::get('team/create', [TeamController::class, 'create'])->name('teams.create');
Route::post('team/store', [TeamController::class, 'store'])->name('teams.store');
Route::get('teams/{team}', [TeamController::class, 'show'])->name('teams.show');
Route::put('team/{team}', [TeamController::class, 'update'])->name('teams.update');
Route::delete('team/{team}', [TeamController::class, 'destroy'])->name('teams.destroy');
Route::get('team/{team}/edit', [TeamController::class, 'edit'])->name('teams.edit');



Route::get('presidents', [PresidentController::class, 'index'])->name('presidents.index');
Route::get('president/create', [PresidentController::class, 'create'])->name('presidents.create');
Route::post('president/store', [PresidentController::class, 'store'])->name('presidents.store');
Route::get('presidents/{president}', [PresidentController::class, 'show'])->name('presidents.show');
Route::put('president/{president}', [PresidentController::class, 'update'])->name('presidents.update');
Route::delete('president/{president}', [PresidentController::class, 'destroy'])->name('presidents.destroy');
Route::get('president/{president}/edit', [PresidentController::class, 'edit'])->name('presidents.edit');

Route::get('players', [PlayerController::class, 'index'])->name('players.index');
Route::get('player/create', [PlayerController::class, 'create'])->name('players.create');
Route::post('player/store', [PlayerController::class, 'store'])->name('players.store');
Route::get('players/{player}', [PlayerController::class, 'show'])->name('players.show');
Route::get('player/{player}/edit', [PlayerController::class, 'edit'])->name('players.edit');
Route::put('player/{player}', [PlayerController::class, 'update'])->name('players.update');
Route::delete('player/{player}', [PlayerController::class, 'destroy'])->name('players.destroy');

Route::get('goals', [GoalController::class, 'index'])->name('goals.index');
Route::get('goal/create', [GoalController::class, 'create'])->name('goals.create');
Route::post('goal/store', [GoalController::class, 'store'])->name('goals.store');
Route::get('goals/{goal}', [GoalController::class, 'show'])->name('goals.show');
Route::get('goal/{goal}/edit', [GoalController::class, 'edit'])->name('goals.edit');
Route::put('goal/{goal}', [GoalController::class, 'update'])->name('goals.update');
Route::delete('goal/{goal}', [GoalController::class, 'destroy'])->name('goals.destroy');

Route::get('games', [GameController::class, 'index'])->name('games.index');
Route::get('game/create', [GameController::class, 'create'])->name('games.create');
Route::post('game/store', [GameController::class, 'store'])->name('games.store');
Route::get('games/{game}', [GameController::class, 'show'])->name('games.show');
Route::get('game/{game}/edit', [GameController::class, 'edit'])->name('games.edit');
Route::put('game/{game}', [GameController::class, 'update'])->name('games.update');
Route::put('game/{game}/update-teams', [GameController::class, 'updateTeams'])->name('games.update_teams'); // <-- esta ruta
Route::delete('game/{game}', [GameController::class, 'destroy'])->name('games.destroy');
