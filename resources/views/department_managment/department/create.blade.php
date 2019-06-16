@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1> Создание группыа </h1>
        </div>
        <div class="card-body">
            <p class="card-text">
                <form action="{{route('department_managment.department.store')}}" class="form-horizontal" method="POST">
                    {{ csrf_field() }}
                    @include('department_managment.department.partials.form')
                </form>  
            </p>
        </div>
    </div>  
</div>    
@endsection