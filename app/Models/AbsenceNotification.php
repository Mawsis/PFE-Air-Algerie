<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenceNotification extends Model
{
    use HasFactory;

    public function absence()
    {
        return $this->belongsTo(Absence::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
