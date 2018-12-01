<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * Разрешаем заполнять все поля 
     */
    protected $guarded = [];

    /**
     * Обратная связь с таблицей User
     */
    public function user(){
        return $this->belongsTo('App\User');
    }
}
