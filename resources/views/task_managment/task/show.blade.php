@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <br>
            <hr>
            <div class="col-sm-9">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <form class="form-horizontal" action="{{route('nextTask',$task)}}" method="get">
                               
                            {{ csrf_field() }}
                            
                            <input type="hidden" name="taskId" value="{{$task->id}}">
                            
                            <h1 class="display-4">Задача: <br>
                                 {{$task->taskName}}</h1>
                            <h2>Описание:</h2>
                            
                            <p> {{@$task->description}} </p>

                            @switch($user->role)
                                @case('Team lead')
                                    <label for="exampleFormControlSelect1">Разарботчик</label>
                                    <select name="taskDeveloper_id" class="form-control" id="exampleSelect1" required >
                                        @foreach ($users as $user)
                                            @if ($user->name == @$task->responsible->name)
                                                @continue
                                            @endif
                                            @if ($user->role == 'Devoloper')
                                                <option value="{{$user->id}}">{{$user->name}} --- {{$user->role}}</option>
                                            @endif
                                                
                                        @endforeach
                                    </select>
                                    <label for="exampleFormControlSelect1">Тестировщик</label>
                                    <select name="taskTester_id" class="form-control" id="exampleSelect1" required >
                                        @foreach ($users as $user)
                                            @if ($user->name == @$task->responsible->name)
                                                @continue
                                            @endif
                                            @if ($user->role == 'Tester')
                                                <option value="{{$user->id}}">{{$user->name}} --- {{$user->role}}</option>
                                            @endif
                                                
                                        @endforeach
                                    </select>
                                    <input type="submit" class="btn btn-primary" value="Назначить">
                                    @break
                                @case('Devoloper')
                                    <label for="exampleFormControlSelect1">Прогресс</label>
                                    <select name="taskProgress" class="form-control" id="exampleSelect1">
                                        <option {{@$task->taskProgress == '1' ? 'selected="selected"': ''}}>1</option>
                                        <option {{@$task->taskProgress == '2' ? 'selected="selected"': ''}}>2</option>
                                        <option {{@$task->taskProgress == '3' ? 'selected="selected"': ''}}>3</option>
                                        <option {{@$task->taskProgress == '4' ? 'selected="selected"': ''}}>4</option>
                                    </select>
                                    <hr>
                                    <input type="submit" class="btn btn-primary" value="Сохранить">
                                    @break
                                @case('Tester')
                                    <label for="exampleFormControlSelect1">Прогресс</label>
                                    <select name="taskProgress" class="form-control" id="exampleSelect1">
                                        <option {{@$task->taskProgress == '1' ? 'selected="selected"': ''}}>1</option>
                                        <option {{@$task->taskProgress == '2' ? 'selected="selected"': ''}}>2</option>
                                        <option {{@$task->taskProgress == '3' ? 'selected="selected"': ''}}>3</option>
                                        <option {{@$task->taskProgress == '4' ? 'selected="selected"': ''}}>4</option>
                                        <option {{@$task->taskProgress == '5' ? 'selected="selected"': ''}}>5</option>
                                    </select>
                                    <hr>
                                    <input type="submit" class="btn btn-primary" value="Сохранить">
                                    @break
                                @default
                                    
                            @endswitch
                            <hr>
                            {{-- <a class="btn btn-primary" href="{{route('nextTask',$task)}}"> Выполнить </a> --}}

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <h2>
                    Поставщик
                </h2>
                {{@$task->provider->name}}
                <hr>
                <h2>
                    Отвественный
                </h2>
                {{@$task->responsible->name}}
                <hr>
                <h2>
                    Разработчик
                </h2>
                {{@$task->developer->name}}
                <hr>
                <h2>
                    Тестировщик
                </h2>
                {{@$task->tester->name}}
                <hr>
                <hr>
                <hr>
                @switch($task->taskStatus)
                    @case(0)
                        Задача у Team Lead
                        @break
                    @case(1)
                        Задача у Разарботчика
                        @break
                    @case(2)
                        Задача у Тестира
                        @break
                    @case(3)
                        Завершина
                        @break
                    @default
                        
                @endswitch
            </div>
        </div>
    </div>
@endsection
