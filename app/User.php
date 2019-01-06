<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

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
     * one to many с таблицей task кто создал
     */
    public function providerTask(){
        return $this->hasMany('App\Task','taskProvider_id','id');
    }
    public function developerTask(){
        return $this->hasMany('App\Task','taskDeveloper_id','id');
    }
    public function testerTask(){
        return $this->hasMany('App\Task','taskTester_id','id');
    }

    /**
     * Возращаем роль 
     */
    public function hasRole($role)
    {
        $user = User::find(Auth::id());
        if ($user->role == $role) 
        return true;
        else false;
        // return User::where('role', $role)->get();
    }
}
