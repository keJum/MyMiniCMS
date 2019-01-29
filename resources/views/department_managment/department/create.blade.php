@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{route('department_managment.department.store')}}" class="form-horizontal" method="POST">
        {{ csrf_field() }}
        @include('department_managment.department.partials.form')
    </form>    
</div>    
@endsection