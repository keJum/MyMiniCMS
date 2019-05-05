<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\User; 
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

        // $tasks = Task::where('taskProvider_id',Auth::id())->count();
        // $tasks += Task::where('taskDeveloper_id',Auth::id())->count();
        // $tasks += Task::where('taskTester_id',Auth::id())->count();
        // $tasks += Task::where('taskRespon_id',Auth::id())->count();
        $user = User::find(Auth::id());

        $url_data = [
            array(
                'title' => 'dka-developrt',
                'url' => 'http://dka-dep.ru'
            ),
            array(
                'title' => 'leaca',
                'url' => 'http://leaxa.ru'
            ),
            array(
                'title' => 'leaca',
                'url' => 'http://leaxa.ru'
            ),
            array(
                'title' => 'leaca',
                'url' => 'http://leaxa.ru'
            ),
            ];

        return view('home',[
            // 'taskCount' => $tasks,
            'user' => $user,
            'url_data' => $url_data
        ]);
    }
    public function ajax()
    {
        return  [
            array(
                'title' => 'dka-developrtLOL',
                'url' => 'http://dka-dep.ru'
            ),
            array(
                'title' => 'leaca',
                'url' => 'http://leaxa.ru'
            )
            ];
    }
    public function line()
    {
        return [
            'labels' => ['март','апрель','май','июнь'],
            'datasets' => array([
                'label' => 'Продажи',
                'backgroundColor' => '#F26202',
                'data' => [15000,500,10000,300000],
            ])
        ];
    }
}
