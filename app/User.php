<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'motor_cycle',
        'year_motor_cycle',
        'role',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function chanceToPlayRacing()
    {
        return $this->hasMany('App\ChanceToPlayRacing', 'user_id', 'id');
    }

    public function race()
    {
        return $this->hasOne('App\Race', 'user_id', 'id');
    }
}
