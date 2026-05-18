<?php
namespace App\Models;
use MongoDB\Laravel\Eloquent\Model;
class UserStreak extends Model {
    protected $fillable = ['user_id', 'streak_count', 'last_activity_date'];
    public function user() { return $this->belongsTo(User::class); }
}
