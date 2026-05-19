<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Workout extends Model
{
    protected $fillable = ['title', 'description', 'difficulty_level'];

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class);
    }
}
