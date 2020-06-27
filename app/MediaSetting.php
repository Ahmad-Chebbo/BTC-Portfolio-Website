<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaSetting extends Model
{
    protected $tables = 'media_settings';
    protected $fillable = ['profile','background','cv','counter','quote','favicon'];
}
