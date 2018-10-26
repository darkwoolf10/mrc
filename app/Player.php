<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $guarded = [];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function pluses()
    {
        return $this->comments()->where('characteristic', 1);
    }

    public function minuses()
    {
        return $this->comments()->where('characteristic', 0);
    }

    public function age()
    {
        return \Carbon::parse($this->birthday)->age;
    }
}
