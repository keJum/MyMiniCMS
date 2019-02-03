<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //Разрешить запись всех полей
    protected $guarded = [];

    /**
     * Обратная связь с таблицей user
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'idObject','id');
    }

    /**
     * Обратная связь с таблицей user
     */
    public function task()
    {
        return $this->belongsTo('App\Task', 'idSubject','id');
    }


}
