<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Progress extends Model
{
    protected $table = 'progress';
    protected $fillable = ['user_id', 'date', 'weight', 'calories_burned'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
