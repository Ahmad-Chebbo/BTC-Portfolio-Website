<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SectionSetting extends Model
{
    protected $tables = 'section_settings';
    protected $fillable = ['section','header','subtitle','enabled'];
}
