<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $guarded = [];

    protected $appends = ['age'];

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

    public function getAgeAttribute()
    {
        return \Carbon::parse($this->attributes['birthday'])->age;
    }
}
