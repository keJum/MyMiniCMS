@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h1>Изменение группы</h1>
    </div>
    <div class="card-body">
        <p class="card-text">
            <div class="container">
                <form class="form-horizontal" action="{{route('department_managment.department.update',$department)}}" method="post">
                    {{ csrf_field() }}
                    {{method_field('PUT')}}
                    @include('department_managment.department.partials.form')
                </form>
            </div>
        </p>
    </div>
</div>
@endsection
