@extends('layouts.app')
@section('content')
    <div class="container">
        {{-- <form action="{{route('user.loadImage',$user)}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <input type="file" name="imageAvatar" id="">
            </div>
            <input type="hidden" name="viewRedir" value="">
            <button type="sudmit" class="btn btn-primary">Згарузить</button>
        </form>

            <img class="img-fluid" src="{{asset('/storage/'.$user->imageAvatar)}}" > --}}

        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <img class="img-fluid img-thumbnail" src="{{asset('/storage/'.$user->imageAvatar)}}" alt="Изображение" width="300px" height="300px">
            </div>
        </div>
        <form action="{{route('user.loadImage',$user)}}" method="post" enctype="multipart/form-data">
            <div class="form-grop">
                {{ csrf_field() }}
                <input type="file" name="image">
            </div>
            {{-- <input type="hidden" name="viewRedir" value="{{Request::url()}}"> --}}
            <br>
            <button id="btn" class="btn btn-default" type="submit">Загрузить на сервер </button>
            <br>
            <hr>
        </form>

        <form class="form-horizontal" action="{{route('storeProfileS',$user)}}" method="post">
            {{ csrf_field() }}
            @include('admin.user_managment.user.partials.form')
            <input type="hidden" name="userId" value="{{$user->id}}">
            <input type="hidden" name="image" value="{{@$images}}">
        </form>
    </div>
@endsection
