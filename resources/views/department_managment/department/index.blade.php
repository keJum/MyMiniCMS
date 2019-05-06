@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Отделы
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        @forelse ($departments  as $item)
                            <div class="col-5">
                                <div class="card" style="width: 14rem;">
                                    <img src="/storage/defualt/depdef.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{@$item->name}}</h5>
                                        <p class="card-text">{{@$item->description}}</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        @foreach (@$item->user as $user)
                                            <li class="list-group-item">{{@$user->name}}</li>
                                        @endforeach
                                    </ul>
                                    <div class="card-body">      
                                        <form onsubmit="if(confirm('Удалить?')){return true} else {return false} " action="{{route('department_managment.department.destroy',$item)}}" method="post">
                                            {{method_field('DELETE')}}
                                            {{ csrf_field() }}
                                            <a href="{{route('department_managment.department.edit',$item)}}" class="btn btn-default">Ред.</a>
                                            <button type="submit" class="btn">Удал.</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-center">
                    <a href="{{route('department_managment.department.create')}}" class="btn btn-primary pull-right">
                        <i class="fas fa-plus-square"></i> 
                        Создать отдел
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection