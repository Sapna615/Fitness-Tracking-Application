<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class WorkoutPlan extends Model
{
    protected $fillable = ['user_id', 'workout_id', 'day', 'sets', 'reps'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function workout()
    {
        return $this->belongsTo(Workout::class);
    }
}
