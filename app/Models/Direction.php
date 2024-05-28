<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    use HasFactory;

    public function employees()
    {
        return $this->hasMany(User::class);
    }

    public function chef()
    {
        return $this->hasOne(Chef::class, 'chef_id');
    }
}
