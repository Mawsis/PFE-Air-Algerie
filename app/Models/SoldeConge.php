<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoldeConge extends Model
{
    use HasFactory;

    public function employee()
    {
        return $this->belongsTo(User::class, "user_id");
    }
    public function restant(): int
    {
        return (int)$this->jours_total - (int)$this->jours_consommes;
    }
}
