<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class President extends Model
{
       protected $fillable = ['name', 'year'];

    public function teams()
    {
        return $this->hasOne(Team::class);
    }
}
