<?php
namespace App\Models;
use MongoDB\Laravel\Eloquent\Model;
class UserAchievement extends Model {
    protected $fillable = ['user_id', 'achievement_id'];
}
