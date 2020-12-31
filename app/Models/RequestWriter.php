<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestWriter extends Model
{
    protected $fillable = [
        'note',
        'status',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
