@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1> Актуальные задачи </h1>
            </div>
            <div class="card-body">
                <div style="max-width: 100%; overflow: auto;">
                    <p class="card-text">
                        <div style="max-width: 100%; overflow: auto;">
                            <task-table-component></task-table-component>
                        </div>
                    </p>
                </div>
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
