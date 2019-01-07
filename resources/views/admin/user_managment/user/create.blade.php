@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{route('admin.user_managment.user.store')}}" class="form-horizontal" method="POST">
        {{ csrf_field() }}
        @include('admin.user_managment.user.partials.form')
    </form>    
</div>    
@endsection