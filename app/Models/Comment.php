<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'username',
        'comment',
        'parent_id',
        'user_id',
        'likes',
        'dislikes',
        'post_id'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function usersInteractions()
    {
        return $this->hasMany(UsersInteraction::class);
    }

}
