@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Создание задачи</h1>
        </div>
        <div class="card-body">
            <p class="card-text">
                <form action="{{route('task_managment.task.store')}}" class="form-horizontal" method="POST">
                    {{ csrf_field() }}
                    @include('task_managment.task.partials.formCreate')  
                </form>    
            </p>
        </div>
    </div>
</div>    
@endsection