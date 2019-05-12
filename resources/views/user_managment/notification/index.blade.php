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
                        <th>Тип</th>
                        <th>Имя</th>
                        <th>Событие</th>
                        <th>Дата</th>
                    </thead>
                    <tbody>
                        @forelse ($user->unreadNotifications as $notification )
                            {{-- !!!!!!!!!!!!!!
                            чтобы сделать прочитаность по каждому открытию уведомления, необходимо разобраться как передовать 2 параметра 
                            !!!!!!!!!!!!!! --}}
                            {{-- Тупо но зато работает  --}}
                            @if ($notification->type == 'App\Notifications\InvoiceTask')
                                @php
                                    $task = App\Task::find($notification->data['task'])
                                @endphp
                                <tr>                                    
                                    <td>
                                        Задача
                                    </td>
                                    <td>
                                        <a href="{{route('task_managment.task.show',$task)}}"> {{$task->name}}</a>
                                    </td>    

                                    <td>
                                        {{$notification->data['type']}}
                                    </td>  
                                    <td>
                                        {{$notification->created_at}}
                                    </td> 
                                </tr>
                            @endif
                            @if ($notification->type == 'App\Notifications\MessegaGet' )
                                <tr>
                                    <td>
                                        Сообщение
                                    </td>
                                    <td>
                                        <a href="/user_managment/message/create/{{$notification->data['message']['sender_id']}}"> 
                                            {{-- {{dd($notification->data['message']['sender_id'])}} --}}
                                            {{$notification->data['sender']}}
                                            {{-- {{User::find($notification->data['message']['sender_id'])->name}} --}}
                                        </a>
                                    </td>
                                    <td>
                                        Новое Сообщение 
                                    </td>
                                    <td>
                                        {{$notification->created_at}}
                                    </td>
                                </tr>
                            @endif      
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
