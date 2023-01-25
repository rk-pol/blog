<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersInteraction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'comment_id',
        'status'
    ];

    public function comments()
    {
        return $this->belongsToMany(Comment::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
