@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h1>Создание ролей</h1>
    </div>
    <div class="card-body">
        <p class="card-text">
            <div class="container">
                <form action="{{route('role.store')}}" class="form-horizontal" method="POST">
                    {{ csrf_field() }}
                    @include('role_managment.role.partials.form')
                </form>    
            </div>    
        </p>
    </div>
</div>

@endsection