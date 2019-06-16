@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Информация о группе</h1>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Название </th>
          <th scope="col">{{$department->name}}</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">id группы</th>
          <td>{{$department->id}}</td>
        </tr>
        <tr>
          <th scope="row">Дата регистрации</th>
          <td>{{$department->created_at}}</td>
        </tr>
        <tr>
          <th scope="row">Полследние изменения</th>
          <td>{{$department->updated_at}}</td>
        </tr>
        <tr>
          <th scope="row">Описание</th>
          <td colspan="2">{{$department->description}}</td>
        </tr>
        <tr>
          <th scope="row">Сотрудники</th>
          <td colspan="2">
            @foreach ($department->user as $user)
              {{ $user->name }}
            @endforeach
          </td>
        </tr>
      </tbody>
    </table>
    {{-- <form action="{{route('editProfile')}}" method="get">
        {{ csrf_field() }}
        <input type="hidden" name="userId" value="{{$user->id}}">
        <button type="submit" class="btn-sudmit">Редактировать.</button>
    </form> --}}
  </div>
@endsection