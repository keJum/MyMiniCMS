@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('department_managment.department.create')}}" class="btn btn-primay pull-right">
            Создать отдел
        </a>
        <table class="table table-striped">
            <thead>
                <th>Изображение</th>
                <th>Имя</th>
                <th>Описание</th>
                <th>Кто состоит</th>
                
                <th class="text-right">Действие</th>
            </thead>
            <tbody>
                @forelse ($departments as $department)
                <tr>
                    <td>
                        {{@$department->imageAvatar}}
                    </td>
                    <td>
                        <a href="{{route('department_managment.department.show',$department)}}">{{$department->name}}</a>
                    </td>
                    <td>
                        {{@$department->description}}
                    </td>
                    <td>
                        @foreach ($department->developer as $developer)
                            {{ $developer->user->name }};
                        @endforeach
                    </td>
                    {{-- <td>
                        @foreach ($department->response as $response)
                            {{ $response->name }}
                        @endforeach
                    </td>
                    <td>
                        @foreach ($department->developer as $developer)
                            {{ $developer->name }}
                        @endforeach
                    </td>
                    <td>
                        @foreach ($department->tester as $tester)
                            {{ $tester->name }}
                        @endforeach
                    </td> --}}
                    <td class="text-right">
                        <form onsubmit="if(confirm('Удалить?')){return true} else {return false} " action="{{route('department_managment.department.destroy',$department)}}" method="post">
                            {{method_field('DELETE')}}
                            {{ csrf_field() }}
                            <a href="{{route('department_managment.department.edit',$department)}}" class="btn btn-default">Ред.</a>
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
                            {{$departments->links()}}
                        </ul>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection