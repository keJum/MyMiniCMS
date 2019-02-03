<?php

namespace App\Http\Controllers;


use App\Task;
use App\Department;
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
            'tasksTeamLiead' => Task::where('taskRespon_id',$user->id)->get(),
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
        $user = User::find(Auth::id());
        $departments  = Department::all();
        return view('task_managment.task.create',[
            'task'=>[''],
            'user' => $user,
            'departments' => $departments,
            'users' => User::all()
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
        return view('task_managment.task.show',[
            'task' => $task,
            'user' => User::find(Auth::id()),
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //Отделы ролей показываются в шаблоне blade
        $user = User::find(Auth::id());
        return view('task_managment.task.edit',[
            'user'=>$user,
            'task'=>$task,
            'users'=>User::all()
        ]);
    }

    /**
     * task edit update dev
     */
    public function selectTask(Request $request){
        $task = Task::where('id',$request['taskId'])->first();
        
        $task->update([
            'taskProgress' => $request['taskProgress'],
            'taskProvider_id' => $task->taskProvider_id,

        ]);

        $task->save();
        return redirect()->back();
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
        $task->description = $request['description'];
        $task->taskProvider_id = $request['taskProvider_id'];
        $task->taskRespon_id = $request['taskRespon_id'];
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


    /**
     * Пометка о том что задача завершила определенный этап и передаётся следующиму
     */
    public function nextTask(Request $request, $task){
        $task = Task::find($task);
        $user = User::find(Auth::id());

        if ($user->role == 'Team lead' ){

            if (!empty($request['taskDeveloper_id'])){
            $task->taskDeveloper_id = $request['taskDeveloper_id'];
            }
            
            if (!empty($request['taskTester_id'])){
            $task->taskTester_id = $request['taskTester_id'];
            }

            $task->taskStatus = 1 ;
            $task->save();
        }

        if ($user->role == 'Devoloper' && $task->taskStatus = 1 ){

            $task->taskProgress = $request['taskProgress'];
            $task->save();
            if ($task->taskProgress == 4){
                $task->taskStatus = 2 ;
                $task->save();
            }
        }

        if ($user->role == 'Tester' && $task->taskStatus = 2 ){

            $task->taskProgress = $request['taskProgress'];
            $task->save();
            if ($task->taskProgress == 5){
                $task->taskStatus = 3 ;
                $task->save();
            }
        }

        return redirect()->back();
    }
}
