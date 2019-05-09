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
                <div style="max-width: 100%; overflow: auto;">
                    <user-table-component></user-table-component>
                </div>
            </div>
        </div>
    </div>
@endsection