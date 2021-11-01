<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\PasswordReset;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'phone_number',
        'instagram',
        'motor_cycle',
        'year_motor_cycle',
        'role',
        'newsletter'
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

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordReset($token));
    }
}
