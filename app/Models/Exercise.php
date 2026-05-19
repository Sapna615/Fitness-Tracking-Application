<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = ['name', 'muscle_group', 'video_url', 'instructions'];

    public function workouts()
    {
        return $this->belongsToMany(Workout::class);
    }
}
