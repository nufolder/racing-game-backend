<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    protected $table = 'race';

    protected $fillable = [
        'user_id',
        'coin',
        'ticket',
        'heal',
        'summary_play',
        'character',
        'last_rider',
        'weekly_winner',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
