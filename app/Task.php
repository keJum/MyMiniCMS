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

    public function provider(){
        return $this->belongsTo('App\User','taskProvied_id');
    }
    public function developer(){
        return $this->belongsTo('App\User','taskDeveloper_id');
    }
    public function tester(){
        return $this->belongsTo('App\User','taskTester_id');
    }
}
