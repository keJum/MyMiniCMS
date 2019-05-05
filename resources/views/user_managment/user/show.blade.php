@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row my-2">
            <div class="col-lg-8 order-lg-2">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Профиль</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Редактировать</a>
                    </li>
                </ul>
                <div class="tab-content py-4">
                    <div class="tab-pane active" id="profile">
                        <h5 class="mb-3">Профиль пользователя</h5>
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
                                    {{$user->department->name}}
                                </p>
                            </div>
                            <div class="col-md-12">
                                <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span> Recent Activity</h5>
                                <table class="table table-sm table-hover table-striped">
                                    <tbody>  
                                        @dump($user->tasks)   
                                        {{-- @forelse ($user->tasks as $task)
                                            {{dump($task)}}
                                        @empty
                                            
                                        @endforelse                                --}}
                                        <tr>
                                            <td>
                                                <strong>Abby</strong> joined ACME Project Team in <strong>`Collaboration`</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--/row-->
                    </div>
                    <div class="tab-pane" id="edit">
                        <form role="form">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">First name</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" value="Jane">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" value="Bishop">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="email" value="email@gmail.com">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Company</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Website</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="url" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Address</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" value="" placeholder="Street">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label"></label>
                                <div class="col-lg-6">
                                    <input class="form-control" type="text" value="" placeholder="City">
                                </div>
                                <div class="col-lg-3">
                                    <input class="form-control" type="text" value="" placeholder="State">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Time Zone</label>
                                <div class="col-lg-9">
                                    <select id="user_time_zone" class="form-control" size="0">
                                        <option value="Hawaii">(GMT-10:00) Hawaii</option>
                                        <option value="Alaska">(GMT-09:00) Alaska</option>
                                        <option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                                        <option value="Arizona">(GMT-07:00) Arizona</option>
                                        <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                                        <option value="Central Time (US &amp; Canada)" selected="selected">(GMT-06:00) Central Time (US &amp; Canada)</option>
                                        <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                                        <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Username</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" value="janeuser">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Password</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="password" value="11111122333">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="password" value="11111122333">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label"></label>
                                <div class="col-lg-9">
                                    <input type="reset" class="btn btn-secondary" value="Cancel">
                                    <input type="button" class="btn btn-primary" value="Save Changes">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-lg-1 text-center">
                <img src="//placehold.it/150" class="mx-auto img-fluid img-circle d-block" alt="avatar">
                <h6 class="mt-2">Upload a different photo</h6>
                <label class="custom-file">
                    <input type="file" id="file" class="custom-file-input">
                    <span class="custom-file-control">Choose file</span>
                </label>
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