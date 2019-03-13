@extends('layouts.app')
@section('content')
    <div class="container">
        <form class="form-horizontal" action="{{route('task_managment.task.update',$task)}}" method="post">
            {{method_field('PUT')}}
            {{ csrf_field() }}
            @include('task_managment.task.partials.formEdit')
        </form>
    </div>
@endsection
