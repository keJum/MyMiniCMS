@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <a href="{{route('admin.user_managment.user.create')}}" class="btn btn-primay pull-right">
            Создать пользователя
        </a>
        <table class="table table-striped">
            <thead>
                <th>Имя</th>
                <th>Email</th>
                <th>Отдел</th>
                <th>Специальность</th>
                <th>Навыки</th>
                <th class="text-right">Действие</th>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr>
                    <td>
                        {{$user->name}}
                    </td>
                    <td>
                        {{$user->email}}
                    </td>
                    <td>
                        {{@$user->appointment}}
                    </td>
                    <td>
                        {{@$user->specialty}}
                    </td>
                    <td>
                        {{@$user->skill}}
                    </td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Удалить?')){return true} else {return false} " action="{{route('admin.user_managment.user.destroy',$user)}}" method="post">
                            {{method_field('DELETE')}}
                            {{ csrf_field() }}
                            <a href="{{route('admin.user_managment.user.edit',$user)}}" class="btn btn-default">Ред.</a>
                            <button type="submit" class="btn">Удал.</button>
                        </form>
                    </td>
                </tr>                    
                @empty
                <tr>
                    <td colspan="3" class="text-center"><h2>Данные отсутвуют</h2></td>
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