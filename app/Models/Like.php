<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'user_id',
        'post_id',
        'status',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
