<?php

namespace App\Models;


class Chef extends User
{

    public static function boot()
    {
        parent::boot();

        static::creating(function ($chef) {
            $chef->forceFill([
                'status' => 'chef',
            ]);
        });
    }
    public static function booted()
    {
        static::addGlobalScope('status', function ($builder) {
            $builder->where('status', 'chef');
        });
    }

    public function directionManage()
    {
        return $this->hasOne(Direction::class, 'chef_id');
    }

    public function employees()
    {
        return $this->directionManage->employees();
    }
}
