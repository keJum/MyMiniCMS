@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <br>
            <hr>
            <div class="col-sm-9">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <form class="form-horizontal" action="{{route('selectTask')}}" method="post">
                               
                            {{ csrf_field() }}
                            
                            <input type="hidden" name="taskId" value="{{$task->id}}">
                            
                            <h1 class="display-4">Задача: {{$task->taskName}}</h1>
                            <h2>Описание:</h2>
                            
                            <p> {{@$task->description}} </p>
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
                    Разработчик
                </h2>
                {{@$task->developer->name}}
                <hr>
                <h2>
                    Тестировщик
                </h2>
                {{@$task->tester->name}}
            </div>
        </div>
    </div>
@endsection
