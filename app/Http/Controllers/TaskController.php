<?php

namespace App\Http\Controllers;


use App\Task;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::id());

        return view('task_managment.task.index',[
            'tasksProvider' => Task::where('taskProvider_id',$user->id)->get(),
            'tasksDeveloper' => Task::where('taskDeveloper_id',$user->id)->get(),
            'tasksTester' => Task::where('taskTester_id',$user->id)->get()
        ]);

    }

    /**
     * Display all listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allIndex()
    {
        return view('admin.task_managment.task.index',[
            'tasks' => Task::all()
        ]);       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task_managment.task.create',[
            'task'=>[''],
            'users'=>User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = Task::create($request->all());
        return redirect()->route('task_managment.task.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('task_managment.task.edit',[
            'task'=>$task,
            'users'=>User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $task->taskName = $request['taskName'];
        $task->taskProvider_id = $request['taskProvider_id'];
        $task->taskDeveloper_id = $request['taskDeveloper_id'];
        $task->taskTester_id = $request['taskTester_id'];
        $task->taskImportance = $request['taskImportance'];
        $task->taskComplexity = $request['taskComplexity'];
        $task->taskProgress = $request['taskProgress'];
        $task->startDevelopment_at = $request['startDevelopment_at'];
        $task->startTesting_at = $request['startTesting_at'];
        $task->finishTesting_at = $request['finishTesting_at'];
        $task->finish_at = $request['finish_at'];

        $task->save();
        return redirect()->route('task_managment.task.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('task_managment.task.index');
    }
}
