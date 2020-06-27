<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $tables = 'titles';
    protected $fillable = ['title','enabled'];
}
