@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Профиль</h1>
        </div>
        <div class="card-body">
            <div class="row my-2">
                <div class="col-lg-4 order-lg-1 text-center">
                    <img src="{{asset('storage/'.$user->image_link)}}" class="mx-auto img-fluid  d-block" alt="avatar" style="margin-bottom: 10px;">
                </div> <br>
                <div class="col-lg-8 order-lg-2">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Просмотр</a>
                        </li>
                        @if ($user->id == Auth::id())
                            <li class="nav-item">
                                <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Редактировать</a>
                            </li>                            
                        @endif

                    </ul>
                    <div class="tab-content py-4">
                        <div class="tab-pane active" id="profile">
                            <h5 class="mb-3">Информация</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Имя :</h6>
                                    <p>
                                        {{$user->name}}
                                    </p>
                                    <h6>Роль : </h6>
                                    <p>
                                        {{@$user->role->name}}
                                    </p>
                                    <h6>
                                        группа : </h6>
                                    <p>
                                        {{@$user->department->name}}
                                    </p>
                                </div>
                                <div class="col-md-12">
                                    <h5 class="mt-2"><i class="fas fa-tasks float-right"></i>Задачи:</h5>
                                    <task-table-component></task-table-component>
                                </div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                            <!--/row-->
                        </div>
                        @if ($user->id == Auth::id())
                            <div class="tab-pane" id="edit">
                                <form id="contactform" action="{{route('loadFile',$user)}}" method="post" class="validateform" name="send-contact" enctype="multipart/form-data"> 
                                    {{ csrf_field() }}
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="hidden" name="type" value="avatar">
                                            <input class="custom-file-input" id="inputGroupFile04" type="file" name="image" >
                                            <label class="custom-file-label" for="inputGroupFile04">Выбрать файл</label>
                                        </div>
                                        <div class="input-group-append">
                                            <input class="btn btn-outline-secondary" type="submit" value="Закачать">
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <form class="form-horizontal" action="{{route('user.update',$user)}}" method="post">
                                    <input name="_method" type="hidden" value="PATCH">
                                    {{ csrf_field() }}
                                    {{ method_field('put') }}
                                    @include('user_managment.user.partials.form')
                                </form>
                            </div>    
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection