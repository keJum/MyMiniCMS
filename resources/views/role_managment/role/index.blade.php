@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Список ролей</h1>
            </div>
            <div class="card-body">
                <p class="card-text">
                    <div style="max-width: 100%; overflow: auto;">
                        <table class="table table-striped" >
                            <thead>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Описание</th>
                            </thead>
                            <tbody>
                                @forelse ($roles as $role)
                                <tr>
                                    <td>
                                        {{$role->id}}
                                    </td>
                                    <td>
                                        <a href="{{route('role.show',$role)}}">{{$role->name}}</a>
                                    </td>
                                    <td>
                                        {{$role->describe}}
                                    </td>
                                </tr>                    
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center"><h2>Нет ролей</h2></td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3">
                                        <ul class="pagination pull-right">
                                            {{$roles->links()}}
                                        </ul>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </p>
            </div>
            <div class="card-footer">
                <a href="{{route('role.create')}}" class="btn btn-primary pull-right">
                    <i class="fas fa-plus-square"></i>
                    Создать роль
                </a>
            </div>
        </div>
    </div>
@endsection