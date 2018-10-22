<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function player()
    {
        return $this->belongsTo('App\Player', 'player_id', 'id');
    }

}
