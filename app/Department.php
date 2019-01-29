<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //Разрешение на запись полей 
    protected $guarded = [];

    /**
     * Обратная связь с таблице developer (инфориации о пользователях)
     */
    public function developer()
    {
        return $this->hasMany('App\Developer','department_id','id');
    }
}
