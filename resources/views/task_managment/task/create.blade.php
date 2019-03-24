@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{route('task_managment.task.store')}}" class="form-horizontal" method="POST">
        {{ csrf_field() }}
        @include('task_managment.task.partials.formCreate')  
    </form>    
</div>    
@endsection