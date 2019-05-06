@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Пользователи</h1>
            </div>
            <div class="card-body">    
                <div class="text-center">
                    <a href="{{route('user.create')}}" class="btn btn-primary pull-right">
                        <i class="fas fa-plus-square"></i> Создать пользователя
                    </a>    
                </div>
                <br>
                <br>
                @include('user_managment.user.partials.userList')
            </div>
        </div>
    </div>
@endsection