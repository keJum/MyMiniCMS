@extends('layouts.app')

@section('content')
<div class="container">

  <h1>Информация о роли</h1>

  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="row">Id</th>
        <td>{{$role->id}}</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="col">Название</th>
        <th scope="col">{{$role->name}}</th>
      </tr>
      <tr>
        <th scope="row">Описание</th>
        <td colspan="2">{{$role->describe}}</td>
      </tr>
      <tr>
        <th scope="row">Пользователи</th>
        <td colspan="2">
            @foreach ($role->user as $user)
              {{ $user->name }}
            @endforeach</td>
      </tr>
      <tr>
        <th scope="row">Дата создания</th>
        <td>{{$role->created_at}}</td>
      </tr>
      <tr>
        <th scope="row">Дата последних изменений</th>
        <td>{{$role->updated_at}}</td>
      </tr>
    </tbody>
  </table>
</div>

@endsection