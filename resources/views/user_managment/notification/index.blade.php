@extends('layouts.app')

@section('content')
    <div class="container">
<div class="card">
    <div class="card-header">
        Список уведомлений
    </div>
    <div class="card-body">
        <p class="card-text">
            @isset($user->unreadNotifications)
                <a href="{{route('notification.read',$user)}}" class="btn btn-primary pull-rightt"> Очистить </a>
            @endisset
            <div style="max-width: 100%; overflow: auto;">
                <table class="table ">
                    <thead>
                        <th>Имя</th>
                        <th>Тип</th>
                        <th>Событие</th>
                        <th>Дата</th>
                    </thead>
                    <tbody>
                        @forelse ($user->unreadNotifications as $notification )
                            {{-- !!!!!!!!!!!!!!
                            чтобы сделать прочитаность по каждому открытию уведомления, необходимо разобраться как передовать 2 параметра 
                            !!!!!!!!!!!!!! --}}
                            {{-- Тупо но зато работает  --}}
                            @php
                                $task = App\Task::find($notification->data['task'])
                            @endphp
                            <tr>
                                <td>
                                    <a href="{{route('task_managment.task.show',$task)}}"> {{$task->name}}</a>
                                </td>    
                                <td>
                                    task
                                </td>
                                <td>
                                    {{$notification->data['type']}}
                                </td>  
                                <td>
                                    {{$notification->created_at}}
                                </td> 
                            </tr>      
                            @empty
                            <tr>
                                <td colspan="3" class="text-center"><h2>Нет уведомлений</h2></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </p>
    </div>
</div>
    </div>
@endsection
