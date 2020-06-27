<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    protected $tables = 'counters';
    protected $fillable = ['header','number','icon'];
}
