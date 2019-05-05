@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Задачи
            </div>
            <div class="card-body">

                <p class="card-text">
                    <task-table-component></task-table-component>
                </p>
            </div>
            <div class="card-footer">
                <div class="text-center">
                    <a href="{{route('task_managment.task.create')}}" class="btn btn-primary ">
                            <i class="fas fa-plus-square"></i> 
                            Создать задачу
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
