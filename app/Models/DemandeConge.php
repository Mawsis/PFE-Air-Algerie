<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeConge extends Model
{
    use HasFactory;

    public function employee()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function jours()
    {
        return Carbon::parse($this->date_debut)->diffInDays(Carbon::parse($this->date_fin));
    }
}
