@extends('layouts.app')
@section('content')
    <div class="container">
        <form class="form-horizontal" action="{{route('role.update',$role)}}" method="post">
            {{ csrf_field() }}
            @include('admin.role_managment.role.partials.form')
            {{-- Необходимый hidden для resource --}}
            <input type="hidden" name="_method" value="PUT">
        </form>
    </div>
@endsection
