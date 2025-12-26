<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'branch_name',
        'city',
        'latitude',
        'longitude'
    ];

    public function doctors()
    {
        return $this->hasMany(User::class);
    }
}

