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
     * Обратная связь с таблицу user
     */
    public function user(){
        return $this->belongsTo('App\User');
    }
}
