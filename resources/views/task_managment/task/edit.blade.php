@extends('admin.layouts.app_admin')
@section('content')
    <div class="container">
        <form class="form-horizontal" action="{{route('task_managment.task.update',$task)}}" method="post">
            {{method_field('PUT')}}
            {{ csrf_field() }}
            @include('task_managment.task.partials.form')
        </form>
    </div>
@endsection
