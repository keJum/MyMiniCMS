@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('user.create')}}" class="btn btn-primay pull-right">
            Создать пользователя
        </a>
        <table class="table table-striped">
            <thead>
                <th>Имя</th>
                <th>Роль</th>
                <th>Специальность</th>
                <th class="text-right">Действие</th>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr>
                    <td>
                        <a href="{{route('user.show',$user)}}">{{$user->name}}</a>
                    </td>
                    <td>
                        {{$user->roles->name}}
                    </td>
                    <td>
                        {{@$user->developer->specialty}}
                    </td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Удалить?')){return true} else {return false} " action="{{route('user.destroy',$user)}}" method="post">
                            {{method_field('DELETE')}}
                            {{ csrf_field() }}
                            <a href="{{route('user.edit',$user)}}" class="btn btn-default">Ред.</a>
                            <button type="submit" class="btn">Удал.</button>
                        </form>
                    </td>
                </tr>                    
                @empty
                <tr>
                    <td colspan="3" class="text-center"><h2>Нет задач</h2></td>
                </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">
                        <ul class="pagination pull-right">
                            {{$users->links()}}
                        </ul>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection