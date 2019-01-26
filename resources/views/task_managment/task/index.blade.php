@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('task_managment.task.create')}}" class="btn btn-primay pull-right">
            Создать задачу
        </a>
        <table class="table">
            <thead>
                <th>Название</th>
                <th>Важность</th>
                <th>Прогресс</th>
                <th>Назначил</th>
                <th>Отвественный</th>
                <th class="text-right">Действие</th>
            </thead>
            <tbody>
                {{-- Provider tasks --}}
                @if (@$tasksProvider)
                    @forelse (@$tasksProvider as $task)
                    <tr>
                        <td colspan="3" class="text-center"><h2>Задачи постовщика </h2></td>
                    </tr>
                    <tr {{ $task->taskProgress == 5 ? 'bgcolor="#ddd"' : '' }} >                 
                        <td>
                            <a href="{{route('task_managment.task.destroy',$task)}}">{{$task->taskName}}</a>
                        </td>
                        <td>
                            {{$task->taskImportance}}
                        </td>
                        <td>
                            {{$task->taskProgress}}
                        </td>
                        <td>
                            {{@$task->provider->name}}
                        </td>
                        <td>
                            {{$task->responsible->name}}
                        </td>
                        <td class="text-right">
                            <form onsubmit="if(confirm('Удалить?')){return true} else {return false} " action="{{route('task_managment.task.destroy',$task)}}" method="post">
                                {{method_field('DELETE')}}
                                {{ csrf_field() }}
                                <a href="{{route('task_managment.task.edit',$task)}}" class="btn btn-default">Ред.</a>
                                <button type="submit" class="btn">Удал.</button>
                            </form>
                        </td>
                    </tr>                    
                    @empty
                    {{-- <tr>
                        <td colspan="3" class="text-center"><h2>Нет задач</h2></td>
                    </tr> --}}
                    @endforelse
                @endif

                {{-- Developer task --}}
                @if (@$tasksDeveloper)
                    @forelse (@$tasksDeveloper as $task)
                    <tr>
                        <td colspan="3" class="text-center"><h2>Задачи разработчика</h2></td>
                     </tr>
                    <tr {{ $task->taskProgress == 5 ? 'bgcolor="#ddd"' : '' }} >      
                        <td>
                            <a href="{{route('task_managment.task.destroy',$task)}}">{{$task->taskName}}</a>
                        </td>
                        <td>
                            {{$task->taskImportance}}
                        </td>
                        <td>
                            {{$task->taskProgress}}
                        </td>
                        <td>
                            {{@$task->provider->name}}
                        </td>                        
                        <td>
                            {{$task->responsible->name}}
                        </td>
                        <td class="text-right">
                            <form onsubmit="if(confirm('Удалить?')){return true} else {return false} " action="{{route('task_managment.task.destroy',$task)}}" method="post">
                                {{method_field('DELETE')}}
                                {{ csrf_field() }}
                                <a href="{{route('task_managment.task.edit',$task)}}" class="btn btn-default">Ред.</a>
                                <button type="submit" class="btn">Удал.</button>
                            </form>
                        </td>
                    </tr>                    
                    @empty
                    {{-- <tr>
                        <td colspan="3" class="text-center"><h2>Нет задач</h2></td>
                    </tr> --}}
                    @endforelse
                @endif
                
                {{-- Tester task --}}

                @if(@$tasksTester)
                    @forelse (@$tasksTester as $task)
                    <tr>
                        <td colspan="3" class="text-center"><h2>Задачи тестировшика</h2></td>
                    </tr>
                    <tr {{ $task->taskProgress == 5 ? 'bgcolor="#ddd"' : '' }} >      
                        <td>
                            <a href="{{route('task_managment.task.destroy',$task)}}">{{$task->taskName}}</a>
                        </td>
                        <td>
                            {{$task->taskImportance}}
                        </td>
                        <td>
                            {{$task->taskProgress}}
                        </td>
                        <td>
                             {{@$task->tester->name}}
                        </td>
                        <td>
                            {{$task->responsible->name}}
                        </td>
                        <td class="text-right">
                            <form onsubmit="if(confirm('Удалить?')){return true} else {return false} " action="{{route('task_managment.task.destroy',$task)}}" method="post">
                                {{method_field('DELETE')}}
                                {{ csrf_field() }}
                                <a href="{{route('task_managment.task.edit',$task)}}" class="btn btn-default">Ред.</a>
                                <button type="submit" class="btn">Удал.</button>
                            </form>
                        </td>
                    </tr>                    
                    @empty
                    {{-- <tr>
                        <td colspan="3" class="text-center"><h2>Нет задач</h2></td>
                    </tr> --}}
                    @endforelse
                @endif

                {{-- Team lead --}}
                @if(@$tasksTeamLiead)

                @forelse (@$tasksTeamLiead as $task)
                <tr>
                    <td colspan="3" class="text-center"><h2>Задачи руководителя группы</h2></td>
                </tr>
                <tr {{ $task->taskProgress == 5 ? 'bgcolor="#ddd"' : '' }} >      
                    <td>
                        <a href="{{route('task_managment.task.destroy',$task)}}">{{$task->taskName}}</a>
                    </td>
                    <td>
                        {{$task->taskImportance}}
                    </td>
                    <td>
                        {{$task->taskProgress}}
                    </td>
                    <td>
                        {{@$task->provider->name}}
                    </td>
                    <td>
                        {{$task->responsible->name}}
                    </td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Удалить?')){return true} else {return false} " action="{{route('task_managment.task.destroy',$task)}}" method="post">
                            {{method_field('DELETE')}}
                            {{ csrf_field() }}
                            <a href="{{route('task_managment.task.edit',$task)}}" class="btn btn-default">Ред.</a>
                            <button type="submit" class="btn">Удал.</button>
                        </form>
                    </td>
                </tr>                    
                @empty
                {{-- <tr>
                    <td colspan="3" class="text-center"><h2>Нет задач</h2></td>
                </tr> --}}
                @endforelse
                @endif

            </tbody>
        </table>
    </div>
@endsection