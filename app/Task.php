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

    // public function providerUsers(){
    //     return $this->belongsToMany('App\User','task_user_provider','taskProvider_id','user_id');
    // }

    public function provider()
    {
        return $this->belongsTo('App\User', 'taskProvider_id','id');
    }
    public function developer(){
        return $this->belongsTo('App\User','taskDeveloper_id','id');
    }
    public function tester(){
        return $this->belongsTo('App\User','taskTester_id','id');
    }
    public function responsible(){
        return $this->belongsTo('App\User','taskRespon_id','id');
    }
}
