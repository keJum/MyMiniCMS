<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    /**
     * Разрешаем заполнять все поля 
     */
    protected $guarded = [];

    /**
     * Обратная связь с таблицу user (пользовотели)
     */
    public function user(){
        return $this->belongsTo('App\User');
    }

    /**
     * Отношение обратное с таблицей Department (отделы)
     */
    public function department(){
        return $this->belongsTo('App\Department','department_id','id');
    }
}
