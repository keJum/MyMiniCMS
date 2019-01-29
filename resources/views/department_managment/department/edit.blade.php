@extends('layouts.app')
@section('content')
    <div class="container">
        {{-- <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <img class="img-fluid img-thumbnail" src="{{asset('/storage/'.$department->imageAvatar)}}" alt="Изображение" width="300px" height="300px">
            </div>
        </div> --}}
        <form class="form-horizontal" action="{{route('department_managment.department.update',$department)}}" method="post">
            {{ csrf_field() }}
            {{method_field('PUT')}}
            @include('department_managment.department.partials.form')
        </form>
    </div>
@endsection
