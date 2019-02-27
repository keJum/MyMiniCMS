<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    //Разрешение на запись полей 
    protected $guarded = [];


    public function user()
    {
        return $this->hasMany('App\User','specialty','id');
    }
}
