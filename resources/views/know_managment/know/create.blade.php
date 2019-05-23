@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Создание записей в базу знаний</h1>
    </div>
    <div class="card-body">
        <p class="card-text">
            <div class="container">
                <form action="{{route('knowledge.store')}}" class="form-horizontal" method="POST">
                    {{ csrf_field() }}
                    @include('know_managment.know.partials.form')
                </form>    
            </div>    
        </p>
    </div>
</div>
    
@endsection