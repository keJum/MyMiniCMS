<?php

namespace App\Http\Controllers;


use App\Task;
use App\Department;
use App\Comment;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\InvoiceTask;
use Illuminate\Support\Facades\Notification;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         *  'type' => 'person', необходима для того чтобы узнать от кого пришла
         */
        $user = User::find(Auth::id());
        $tasks[] = Task::where('respon_id',$user->id)->get();
        $tasks[] = Task::where('provider_id',$user->id)->get();
        $tasks[] = Task::where('developer_id',$user->id)->get();
        $tasks[] = Task::where('tester_id',$user->id)->get();

        return view('task_managment.task.index',[
            'type' => 'person',
            'tasks' => $tasks
        ]);
    }

    /**
     * Display all listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allIndex()
    {
        return view('task_managment.task.index',[
            'type' => 'all',
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
        return view('task_managment.task.create',[
            'task'          =>[''],
            'user'          => $user,
            'departments'   => Department::all(),
            'users'         => User::all()
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

        $task = Task::create([
            'name'          => $request['name'],
            'description'   => $request['description'],
            'importance'    => $request['importance'],
            'provider_id'   => $request['provider_id'],
            'respon_id'     => $request['respon_id'],
            'status'        => 0
        ]);
        
        if(isset($task->responsible)){ $users[] = $task->responsible; }
        if(isset($task->provider)){ $users[] = $task->provider; }
        if(isset($task->developer)){ $users[] = $task->developer; }
        if(isset($task->tester)){ $users[] = $task->tester; }
        Notification::send( $users ,new InvoiceTask($task,'crate'));

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
        
        // dd(User::find(Auth::id()));
        return view('task_managment.task.show',[
            'task'          => $task,
            'user'          => User::find(Auth::id()),
            'userAuth'      => User::find(Auth::id()),
            'users'         => User::all(),
            'comments'      => Comment::where('idObject','=', $task->id)->get(),
            'departments'   => Department::all(),
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
            'user'          =>$user,
            'task'          =>$task,
            'users'         =>User::all(),
            'departments'   => Department::all()
        ]);
    }

    /**
     * task edit update dev
     */
    public function selectTask(Request $request){
        $task = Task::where('id',$request['taskId'])->first();
        
        $task->update([
            'taskProgress'      => $request['taskProgress'],
            'taskProvider_id'   => $task->taskProvider_id,

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
        /**
         * Если разработчик завершил задачу на процесс ( этап ) 5 
         */
        if ( $request['progress'] == 5  ){
            $task->status  = 1; 
        }
        

        if(isset($request['name']                )){  $task->name                = $request['name'];                  }
        if(isset($request['description']         )){  $task->description         = $request['description'];           }
        if(isset($request['provider_id']         )){  $task->provider_id         = $request['provider_id'];           }
        if(isset($request['respon_id']           )){  $task->respon_id           = $request['respon_id'];             }
        if(isset($request['developer_id']        )){  $task->developer_id        = $request['developer_id'];          }
        if(isset($request['tester_id']           )){  $task->tester_id           = $request['tester_id'];             }
        if(isset($request['importance']          )){  $task->importance          = $request['importance'];            }
        if(isset($request['complexity']          )){  $task->complexity          = $request['complexity'];            }
        if(isset($request['progress']            )){  $task->progress            = $request['progress'];              }
        if(isset($request['status']              )){  $task->status              = $request['status'];                }
        if(isset($request['startDevelopment_at'] )){  $task->startDevelopment_at = $request['startDevelopment_at'];   }
        if(isset($request['startTesting_at']     )){  $task->startTesting_at     = $request['startTesting_at'];       }
        if(isset($request['finishTesting_at']    )){  $task->finishTesting_at    = $request['finishTesting_at'];      }
        if(isset($request['finish_at']           )){  $task->finish_at           = $request['finish_at'];             }

        // dd($task);
        $task->save();

        $users[] ='';
        
        if(isset($task->responsible)){ $users[] = $task->responsible; }
        if(isset($task->provider)){ $users[] = $task->provider; }
        if(isset($task->developer)){ $users[] = $task->developer; }
        if(isset($task->tester)){ $users[] = $task->tester; }
        if ($users[0] !== ''){
            Notification::send( $users ,new InvoiceTask($task,'update'));
        }

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
        $task->comments()->delete();
        return redirect()->route('task_managment.task.index');
    }

    /**
     * Метод для работы с завершением задачи 
     */

    public function success( Task $task, $str )
    {

        switch ($str) {
            case 'endTask':
                $task->status = 5;
                
                if(isset($task->responsible)){ $users[] = $task->responsible; }
                if(isset($task->provider)){ $users[] = $task->provider; }
                if(isset($task->developer)){ $users[] = $task->developer; }
                if(isset($task->tester)){ $users[] = $task->tester; }
                Notification::send( $users ,new InvoiceTask($task,'end'));
                break;
            case 'readyTask':
                $task->status = 4;

                if(isset($task->responsible)){ $users[] = $task->responsible; }
                if(isset($task->provider)){ $users[] = $task->provider; }
                if(isset($task->developer)){ $users[] = $task->developer; }
                if(isset($task->tester)){ $users[] = $task->tester; }
                Notification::send( $users ,new InvoiceTask($task,'ready'));
                break;
            default:
                break;
        }
        $task->save();
        return redirect()->route('task_managment.task.index');

        
    }

}
