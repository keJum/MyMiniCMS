@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Создание нового пользователя
        </div>
        <div class="card-body">
            <p class="card-text">
                <form action="{{route('user.store')}}" class="form-horizontal" method="POST">
                    {{ csrf_field() }}
                    @include('user_managment.user.partials.form')
                </form>   
            </p>
        </div>
    </div> 
</div>    
@endsection