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
                    @foreach (@$tasks as $task)
                    @if ($type == 'person')
                        @foreach ($task as $item)
                            <tr {{ @$item->status == 5 ? 'bgcolor="#8FBC8F"' : '' }} >    
                                <td>
                                    <a href="{{route('task_managment.task.show',$item)}}">{{@$item->name}}</a>
                                </td>
                                <td>
                                    {{@$item->importance}}
                                </td>
                                <td>
                                    {{@$item->progress}}
                                </td>
                                <td>
                                    {{@$item->provider->name}}
                                </td>
                                <td>
                                    {{@$item->responsible->name}}
                                </td>
                                <td class="text-right">
                                    <form onsubmit="if(confirm('Удалить?')){return true} else {return false} " action="{{route('task_managment.task.destroy',$item)}}" method="post">
                                        {{method_field('DELETE')}}
                                        {{ csrf_field() }}
                                        <a href="{{route('task_managment.task.edit',$item)}}" class="btn btn-default">Ред.</a>
                                        <button type="submit" class="btn">Удал.</button>
                                    </form>
                                </td>
                            </tr>                    
                        @endforeach
                    @endif
                    
                    @if ($type == 'all')
                        <tr {{ @$task->status == 5 ? 'bgcolor="#8FBC8F"' : '' }} >    
                            <td>
                                <a href="{{route('task_managment.task.show',$task)}}">{{@$task->name}}</a>
                            </td>
                            <td>
                                {{@$task->importance}}
                            </td>
                            <td>
                                {{@$task->progress}}
                            </td>
                            <td>
                                {{@$task->provider->name}}
                            </td>
                            <td>
                                {{@$task->responsible->name}}
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
                    @endif
                        {{-- @isset($task->name)
                            @dump($task)
                        @endisset --}}
                    {{--  --}}
                    @endforeach
            </tbody>
        </table>
    </div>
@endsection
