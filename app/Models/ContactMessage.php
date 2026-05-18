<?php
namespace App\Models;
use MongoDB\Laravel\Eloquent\Model;
class ContactMessage extends Model {
    protected $fillable = ['user_id', 'name', 'email', 'subject', 'message'];
    public function user() { return $this->belongsTo(User::class); }
}
