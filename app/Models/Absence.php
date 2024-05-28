<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    public function employee()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function horaire()
    {
        return $this->belongsTo(Horaire::class);
    }
}
