<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeCongeNotification extends Model
{
    use HasFactory;

    public function demandeConge()
    {
        return $this->belongsTo(DemandeConge::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
