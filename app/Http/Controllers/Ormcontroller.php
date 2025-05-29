<?php

namespace App\Http\Controllers;

use App\Models\President;
use App\Models\Team;
use App\Models\Player;
use App\Models\Game;
use App\Models\Goal;

class OrmController extends Controller
{
    public function consultas()
     {
        // 1. Mostrar todos los presidentes registrados
        //eturn President::all();

        //  2. Mostrar los equipos que tiene un presidente
        //$president = President::find(1);
         //return $president->teams;

        // ✅ 3. Mostrar el presidente de un equipo
        //$team = Team::find(1);
        //return $team->president;

        // ✅ 4. Mostrar los jugadores de un equipo
         //$team = Team::find(1);
        // return $team->players;

        // ✅ 5. Mostrar el equipo de un jugador
        // $player = Player::find(2);
         //return $player->team;

        // ✅ 6. Mostrar los goles de un jugador
        // $player = Player::find(1);
         //return $player->goals;

        // ✅ 7. Mostrar el jugador y el juego de un gol
        // $goal = Goal::find(1);
        // return [
        //     'jugador' => $goal->player,
        //     'juego' => $goal->game
        // ];

        // ✅ 8. Mostrar los equipos que participaron en un juego
        // $game = Game::find(1);
        // return $game->teams;

        // ✅ 9. Mostrar los juegos en los que ha participado un equipo
        // $team = Team::find(2);
         //return $team->games;

        //return "Consulta no activada. Descomenta una línea para ver el resultado.";
    }
  
}
