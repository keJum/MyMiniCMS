@extends('admin.layouts.app_admin')
@section('content')
<div class="container">
    <form action="{{route('task_managment.task.store')}}" class="form-horizontal" method="POST">
        {{ csrf_field() }}
        @include('task_managment.task.partials.form')
    </form>    
</div>    
@endsection