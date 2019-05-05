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
     * Отношение обратное с таблицей Role
     */
    public function role()
    {
        return $this->belongsTo('App\Role','role_id','id');
    }
    /**
     * Отношение обратное с таблицей  Specialty
     */
    public function specialty()
    {
        return $this->belongsTo('App\Specialty','specialty_id','id');
    }
    /**
     * Отношение обратное с таблицей Department (отделы)
     */
    public function department()
    {
        return $this->belongsTo('App\Department','department_id','id');
    }

    /**
     * one to many с таблицей task кто создал
     */
    public function providerTask()
    {
        return $this->hasMany('App\Task','taskProvider_id','id');
    }
    public function developerTask()
    {
        return $this->hasMany('App\Task','taskDeveloper_id','id');
    }
    public function testerTask()
    {
        return $this->hasMany('App\Task','taskTester_id','id');
    }
    /**
     * One to many с таблице комментариев 
     */
    public function comment()
    {
        return $this->hasMany('App\Comment','idSubject','id');
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

    // public function tasks(){
    //     // $tasks[] = Task::where('respon_id',$user->id)->get();
    //     $tasks[] = $this->providerTask();
    //     $tasks[] = $this->developerTask();
    //     $tasks[] = $this->testerTask();
    //     // dd($tasks);
    //     $tasks = array_unique($tasks);
    //     var_dump($tasks);
    //     die
    //     // dd($tasks);
    //     return $tasks;
    // }
}
