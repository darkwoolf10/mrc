<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ['name', 'surname', 'rank', 'age', 'plus', 'minus'];
}
