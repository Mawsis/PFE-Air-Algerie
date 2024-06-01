<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function direction()
    {
        return $this->belongsTo(Direction::class);
    }

    public function horaires()
    {
        return $this->hasMany(Horaire::class);
    }


    public function absences()
    {
        return $this->hasMany(Absence::class);
    }

    public function demandesConge()
    {
        return $this->hasMany(DemandeConge::class, "user_id");
    }

    public function soldesConge()
    {
        return $this->hasMany(SoldeConge::class, "user_id");
    }
    public function directionManage()
    {
        return $this->hasOne(Direction::class, 'chef_id');
    }
    public function absenceNotifications()
    {
        return $this->hasMany(AbsenceNotification::class);
    }

    public function notifications()
    {
        $notifications = collect();
        if ($this->status == 'admin') {
            $notifications = AbsenceNotification::with('absence')->with('user')->get();
        } elseif ($this->status == 'chef') {
            $notifications = $this->absenceNotifications()->with('absence')->with('user')->get();
        }
        return $notifications;
    }
}
