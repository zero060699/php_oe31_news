<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
    ];

    public function permissions()
    {
        return $this->belongsToMany(Role::class);
    }

    public function requestsWriter()
    {
        return $this->hasMany(RequestWriter::class);
    }
}
