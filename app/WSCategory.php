<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WSCategory extends Model
{
    protected $tables = 'w_s_categories';
    protected $fillable = ['name'];


    public function project()
    {
        return $this->hasMany('App\WSProject');
    }

}
