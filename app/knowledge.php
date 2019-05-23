<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class knowledge extends Model
{
    protected $guarded = [];

    public function department()
    {
        return $this->hasMany('App\Department','id','department_id');
    }
}
