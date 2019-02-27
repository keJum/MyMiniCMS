<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //Разрешение на запись полей 
    protected $guarded = [];

    
    public function user()
    {
        return $this->hasMany('App\User','role','id');
    }
}
