<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class DietPlan extends Model
{
    protected $fillable = [
        'user_id', 'meal_type', 'food_item', 'name', 'calories', 'date', 'time', 'description', 'tag', 'tag_color',
        'carbs', 'protein', 'fat', 'completed'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
