<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password' ,'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * one-to one с таблице developer
     */
    public function developer(){
        return $this->hasOne('App\Developer');
    }
    /**
     * one to many с таблицей task
     */
    public function providerTask(){
        return $this->hasMany('App\User','id','taskProvied_id');
    }
    public function developerTask(){
        return $this->hasMany('App\User','id','taskDeveloper_id');
    }
    public function testerTask(){
        return $this->hasMany('App\User','id','taskTester_id');
    }

    /**
     * Возращаем роль 
     */
    public function hasRole($role)
    {
        return User::where('role', $role)->get();
    }
}
