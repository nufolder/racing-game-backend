<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChanceToPlayRacing extends Model
{
    protected $table = 'chance_to_play_racing';

    protected $fillable = [
        'user_id',
        'type',
        'last_date',
        'summary_count',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
