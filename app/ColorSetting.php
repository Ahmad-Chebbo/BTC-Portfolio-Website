<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ColorSetting extends Model
{
    protected $tables = 'color_settings';
    protected $fillable = ['primary','secondary','footer'];
}
