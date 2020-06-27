<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WSProject extends Model
{
    protected $tables = 'w_s_projects';
    protected $fillable =['title','description','category_id','image','from','to','url'];

    public function category()
    {
        return $this->belongsTo('App\WSCategory');

    }
}
