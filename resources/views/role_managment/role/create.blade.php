@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{route('role.store')}}" class="form-horizontal" method="POST">
        {{ csrf_field() }}
        @include('role_managment.role.partials.form')
    </form>    
</div>    
@endsection