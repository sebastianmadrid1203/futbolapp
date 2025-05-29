<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['date', 'local_goals', 'away_goals'];

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'team_game');
    }

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }
}
