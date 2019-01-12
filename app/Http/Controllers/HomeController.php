<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = User::find(Auth::id());

        $tasks = Task::where('taskProvider_id',Auth::id())->count();
        $tasks += Task::where('taskDeveloper_id',Auth::id())->count();
        $tasks += Task::where('taskTester_id',Auth::id())->count();
        $user = User::find(Auth::id());

        return view('home',[
            'taskCount' => $tasks,
            'user' => $user
        ]);
    }
}
