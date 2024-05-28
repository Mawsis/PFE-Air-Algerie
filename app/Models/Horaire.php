<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horaire extends Model
{
    use HasFactory;

    public function employee()
    {
        return $this->belongsTo(User::class);
    }
    public function absence()
    {
        return $this->hasOne(Absence::class);
    }
}
