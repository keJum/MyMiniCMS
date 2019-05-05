@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-around bd-highlight row ">
                <div class="card p-2 bd-highlight" style="width: 18rem; margin: 1rem">
                    <div class="card-body">
                        <a href="{{route('taskAll')}}">
                            <center>
                                <i class="fa fa-tasks fa-5x mb-4" aria-hidden="true"  ></i>
                                <h5 class="card-title">Все задачи</h5>
                            </center>
                        </a>
                    </div>
                </div>
                <div class="card p-2 bd-highlight" style="width: 18rem; margin: 1rem">
                    <div class="card-body">
                        <a href="{{route('user.index')}}">
                            <center>
                                <i class="fa fa-users fa-5x mb-4" aria-hidden="true"  ></i>
                                <h5 class="card-title">Все пользователи</h5>
                            </center>
                        </a>
                    </div>
                </div>
                <div class="card p-2 bd-highlight" style="width: 18rem; margin: 1rem">
                    <div class="card-body">
                        <a href="{{route('department_managment.department.index')}}">
                            <center>
                                <i class="fa fa-id-badge  fa-5x mb-4" aria-hidden="true"  ></i>
                                <h5 class="card-title">Все отделы</h5>
                            </center>
                        </a>
                    </div>
                </div>
                <div class="card p-2 bd-highlight" style="width: 18rem; margin: 1rem">
                    <div class="card-body">
                        <a href="{{route('role.index')}}">
                            <center>
                                <i class="fa fa-bookmark  fa-5x mb-4" aria-hidden="true"  ></i>
                                <h5 class="card-title">Все роли</h5>
                            </center>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
