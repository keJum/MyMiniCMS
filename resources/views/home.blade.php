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
                    вы вошли как {{$user->role->name}}
                    <hr> Вы имеете полный доступ к возмодностям всех ролей, управлению пользователями и управлению отделами.
                    <br>
                    <a class="btn btn-primary btn-lg btn-block" href="{{route('taskAll')}}" style="margin-top: 60px;" >
                        Все задачи
                    </a>
                    <a class="btn btn-primary btn-lg btn-block" href="{{route('user.index')}}">
                        Все пользователи
                    </a>
                    <a class="btn btn-primary btn-lg btn-block" href="{{route('department_managment.department.index')}}">
                        Все отделы
                    </a>
                    <a class="btn btn-primary btn-lg btn-block" href="{{route('role.index')}}">
                        Все роли
                    </a>

                    @switch($user->role)
                        @case('Admin')
                            <a href="/admin">{{$user->role}}</a>
                            <hr> Вы имеете полный доступ к возмодностям всех ролей, управлению пользователями и управлению отделами.
                            <br>
                            <a class="btn btn-primary btn-lg btn-block" href="{{route('taskAll')}}" style="margin-top: 60px;" >
                                Все задачи
                            </a>
                            <a class="btn btn-primary btn-lg btn-block" href="{{route('admin.user.index')}}">
                                Все пользователи
                            </a>
                            <a class="btn btn-primary btn-lg btn-block" href="{{route('department_managment.department.index')}}">
                                Все отделы
                            </a>
                            <a class="btn btn-primary btn-lg btn-block" href="{{route('role.index')}}">
                                Все роли
                            </a>
                            @break
                        @case('Task manager')
                            <a href="/admin">{{$user->role}}</a>
                            <hr> Вы имеете возможность создовать задачи и просмтаривать статистику их выполнения
                            <a class="btn btn-primary btn-lg btn-block" href="{{route('task_managment.task.create')}}" style="margin-top: 60px;" >
                                Создать задачу
                            </a>
                            @break
                        @case('Team lead')
                            <a href="/admin">{{$user->role}}</a>
                            <hr> Вы имете возможности создовать и переноправлять задачи на разработчиков и тестиров и просмотривать выполняемую разработчиком задачу и статиску
                            @break
                        @case('Devoloper')
                            <a href="/admin">{{$user->role}}</a>
                            <hr> Вы имеете возможности завершать задачу ( после чего она перенаправяляеться на тестировщика ) и просматривать свою результаты ( статиску )
                            @break
                        @case('Tester')
                            <a href="/admin">{{$user->role}}</a>
                            <hr> Вы имеете возможности завершать задачу ( после чего она перенаправяляеться на завершение ) и просматривать свою результаты ( статиску )
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
