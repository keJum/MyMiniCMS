@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Панель управления</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Добро пожаловать
                    {{$user->name}}
                    вы вошли как 
                    @switch($user->role)
                        @case('Admin')
                            <a href="/admin">{{$user->role}}</a>
                            @break
                        @case('Task manager')
                            <a href="/admin">{{$user->role}}</a>
                            @break
                        @case('Team lead')
                            <a href="/admin">{{$user->role}}</a>
                        @break
                        @case('Devoloper')
                            <a href="/admin">{{$user->role}}</a>
                        @break
                        @case('Tester')
                            <a href="/admin">{{$user->role}}</a>
                        @break
                        @default
                            Не известно
                    @endswitch
                    <hr>
                    У вас задач:
                    <a  href="{{route('task_managment.task.index')}}">
                        {{$taskCount}} 
                    </a>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-2">
            <div class="card">
                <div class="card-header">
                    Пофиль пользователя
                </div>
                <div class="card-body">
                
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection
