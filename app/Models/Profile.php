<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'age', 'weight', 'height', 'gender', 'fitness_goal', 'activity_level'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
