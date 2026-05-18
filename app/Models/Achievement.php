<?php
namespace App\Models;
use MongoDB\Laravel\Eloquent\Model;
class Achievement extends Model {
    protected $fillable = ['title', 'description', 'icon'];
    public function users() { return $this->belongsToMany(User::class, 'user_achievements'); }
}
