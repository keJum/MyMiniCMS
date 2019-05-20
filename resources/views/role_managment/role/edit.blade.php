@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h1>Изменение роли пользователя</h1>
    </div>
    <div class="card-body">
        <p class="card-text">
            <div class="container">
                <form class="form-horizontal" action="{{route('role.update',$role)}}" method="post">
                    {{ csrf_field() }}
                    @include('role_managment.role.partials.form')
                    {{-- Необходимый hidden для resource --}}
                    <input type="hidden" name="_method" value="PUT">
                </form>
            </div>
        </p>
    </div>
</div>
@endsection
