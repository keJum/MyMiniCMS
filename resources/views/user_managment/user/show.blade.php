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
                        <li class="nav-item">
                            <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Редактировать</a>
                        </li>
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
                                        {{$user->role->name}}
                                    </p>
                                    <h6>
                                        Отдел : </h6>
                                    <p>
                                        {{@$user->department->name}}
                                    </p>
                                </div>
                                <div class="col-md-12">
                                    <h5 class="mt-2"><i class="fas fa-tasks float-right"></i>Задачи:</h5>
                                    <task-table-component></task-table-component>
                                </div>
                            </div>
                            <!--/row-->
                        </div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


  {{-- <div class="container-fluid text-center">
    <div class="row">            
    </div>
    <br>
      <div class="row">
          <div class="col-sm-5">
                <img class="img-fluid img-thumbnail" src="{{asset('storage/'.$user->image_link)}}" alt="Avatar" width="300px" height="300px">
          </div>
          <div class="col-sm-6">
                <ul class="list-group text-left">
                    <li class="list-group-item"><p class="text-primary"> Номер пользователя :        </p>{{@$user->id}}</li>
                    <li class="list-group-item"><p class="text-primary"> Имя :                       </p>{{@$user->name}}</li>
                    <li class="list-group-item"><p class="text-primary"> Почта :                     </p>{{@$user->email}}</li>
                    <li class="list-group-item"><p class="text-primary"> Отдел :                     </p>{{@$user->department->name}}</li>
                    <li class="list-group-item"><p class="text-primary"> Роль пользователя :         </p>{{@$user->role->name}}</li>
                    <li class="list-group-item"><p class="text-primary"> Специальность:              </p>{{@$user->specialty}}</li>
                </ul>
          </div>
      </div> --}}
    {{-- <h1>Информация о пользователе</h1>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Имя пользователя </th>
          <th scope="col">{{$user->name}}</th>
        </tr>
        </thead>
      <tbody>
        <tr>
          <th scope="row">Личный id пользователя</th>
          <td>{{$user->id}}</td>
        </tr>
        <tr>
          <th scope="row">Дата регистрации</th>
          <td>{{$user->created_at}}</td>
        </tr>
        <tr>
          <th scope="row">Автар</th>
          <td colspan="2">
              <img class="img-fluid img-thumbnail" src="{{asset('storage/'.$user->image_link)}}" alt="Avatar" width="200px" height="200px">
            </td>
        </tr>
        <tr>
          <th scope="row">Роль пользователя</th>
          <td colspan="2">{{$user->role}}</td>
        </tr>
        <tr>
          <th scope="row">Почта</th>
          <td colspan="2">{{$user->email}}</td>
        </tr>
      @if (@$user->developer->specialty)
        <tr>
          <th scope="row">Специальность</th>
          <td colspan="2">{{$user->developer->specialty}}</td>
        </tr>
        <tr>
          <th scope="row">Отдел</th>
          <td colspan="2">{{@$user->developer->department->name}}</td>
        </tr>
        <tr>
          <th scope="row">Навыки</th>
          <td colspan="2">{{$user->developer->skill}}</td>
        </tr>
        <tr>
          <th scope="row">Расписание</th>
          <td colspan="2">{{$user->developer->schedule}}</td>
        </tr>
      @endif
      </tbody>
    </table> --}}
    {{-- <div class="row ">
            <div class="col-sm">
                    <a  class="btn btn-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        Выход
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div> 
                <div class="col-sm">
                    <form action="{{route('user.edit',$user)}}" method="get">
                        {{ csrf_field() }}
                        <input type="hidden" name="userId" value="{{$user->id}}">
                        <button type="submit" class="btn btn-primary">Редактировать.</button>
                    </form>
                </div>
    </div> 
  </div> --}}
@endsection