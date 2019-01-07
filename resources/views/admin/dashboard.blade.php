@extends('layouts.app')

@section('content')
<li class="nav-item dropdown">
        <a class="nav-link" href="{{route('taskAll')}}">
            Все задачи
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link" href="{{route('admin.user_managment.user.index')}}">
            Все пользователи
        </a>
    </li>
</li>
{{-- <div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="jumbotron">
                <div class="label label-primary">
                    Категорий 0
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="jumbotron">
                <div class="label label-primary">
                    Матерьялов 0
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="jumbotron">
                <div class="label label-primary">
                    Поситителей 0
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="jumbotron">
                <div class="label label-primary">
                    Сегодня 0
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <a href="#" class="btn btn-block btn-default">Создать категорию</a>
            <a class="list-group-item" href="#">
                <h4 class="list-group-item-heading">Категория первая</h4>
                <p class="list-group-item-text">
                    Кол-во матерьялов
                </p>
            </a>
        </div>
        <div class="col-sm-6">
            <a href="#" class="btn btn-block btn-default">Создать матерьял</a>
            <a class="list-group-item" href="#">
                <h4 class="list-group-item-heading">Матерьял перваый</h4>
                <p class="list-group-item-text">
                    Категория
                </p>
            </a>
        </div>
    </div> --}}
</div>
@endsection