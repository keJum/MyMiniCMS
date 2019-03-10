@extends('layouts.app')

@section('content')
  <div class="container">




    <h1>Информация о пользователе</h1>
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
          <td colspan="2"><img class="img-fluid img-thumbnail" src="{{asset('storage/'.$user->image)}}" alt="Avatar" width="300px" height="300px"></td>
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
      </tbody>
    </table>

    <hr>

{{-- @if ($user->providerTask->count())
    <h3>Поставщик Задачи</h3>

      <table class="table table-hover table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Кто назначил</th>
            <th scope="col">Разработчик</th>
            <th scope="col">Тестер</th>
            <th scope="col">Важность</th>
          </tr>
        </thead>
        <tbody>
@foreach ($user->providerTask as $task)
            <tr>
              <th scope="row">{{$task->id}}</th>
              <td>{{$task->taskName}}</td>
              <td>{{$task->provider->name}}</td>
              <td>{{@$task->developer->name}}</td>
              <td>{{$task->tester->name}}</td>
            </tr>
@endforeach
        </tbody>
      </table>
@endif --}}


{{-- @if ($user->developerTask->count())
    <h3>Разработчки Задачи</h3>

      <table class="table table-hover table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Кто назначил</th>
            <th scope="col">Разработчик</th>
            <th scope="col">Тестер</th>
            <th scope="col">Важность</th>
          </tr>
        </thead>
        <tbody>
@foreach ($user->developerTask as $task)
            <tr>
              <th scope="row">{{$task->id}}</th>
              <td>{{$task->taskName}}</td>
              <td>{{$task->provider->name}}</td>
              <td>{{@$task->developer->name}}</td>
              <td>{{$task->tester->name}}</td>
            </tr>
@endforeach
        </tbody>
      </table>
@endif --}}

{{-- @if ($user->testerTask->count())
    <h3>Тестировшик Задачи</h3>

      <table class="table table-hover table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Кто назначил</th>
            <th scope="col">Разработчик</th>
            <th scope="col">Тестер</th>
            <th scope="col">Важность</th>
          </tr>
        </thead>
        <tbody>
@foreach ($user->testerTask as $task)
            <tr>
              <th scope="row">{{$task->id}}</th>
              <td>{{$task->taskName}}</td>
              <td>{{$task->provider->name}}</td>
              <td>{{@$task->developer->name}}</td>
              <td>{{$task->tester->name}}</td>
            </tr>
@endforeach
        </tbody>
      </table>
@endif --}}

    

@endif
      </tbody>
    </table>
    <form action="{{route('user.edit',$user)}}" method="get">
        {{ csrf_field() }}
        <input type="hidden" name="userId" value="{{$user->id}}">
        <button type="submit" class="btn-sudmit">Редактировать.</button>
    </form>
  </div>
@endsection