@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{route('task_managment.task.edit',$task)}}" class="btn btn-defoult">Редактировать задачу</a>
        <hr>
        {{-- Описание задачи --}}
        <div class="row">
            <br>
            <hr>
            <div class="col-sm-9">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">Задача:  {{$task->name}} <br></h1>
                        <h2>Описание:</h2>
                        <p> {{@$task->description}} </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <h2>
                    Поставщик
                </h2>
                {{@$task->provider->name}}
                <hr>
                <h2>
                    Отвественный
                </h2>
                {{@$task->responsible->name}}
                <hr>
                <h2>
                    Разработчик
                </h2>
                {{@$task->developer->name}}
                <hr>
                <h2>
                    Тестировщик
                </h2>
                {{@$task->tester->name}}
                <hr>
                <hr>
                <hr>
                @switch(@$task->status)
                    @case(0)
                        задача на распределении   
                        @break
                    @case(1)
                        задача на проверки
                        @break
                    @case(2)
                        задача на переработки
                        @break
                    @case(3)
                        задача работает
                        @break
                    @case(4)
                        задача потвердена
                    @break
                    @case(5)
                        задача в архиве 
                    @break
                    @default
                @endswitch
            </div>
        </div>
    </div>
    {{-- Комментария у задачи --}}
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="page-header">
                <h1><small class="pull-right">Comments {{$comments->count()}}</small>  </h1>
                </div> 
                <div class="comments-list">
                    {{-- Карточка комментария --}}
                    @foreach ($comments as $comment)
                        <div class="media">
                                <p class="pull-right" style="margin-right: 100px;">
                                    <small>{{$comment->created_at}}</small>
                                </p>
                                <a class="media-left" href="#">
                                    <img src="{{asset('storage/'.$comment->user->imageAvatar)}}" width="50" height="50">
                                </a>
                                <div class="media-body" style="margin-left: 40px;">
                                    
                                    <h4 class="media-heading user_name" style="margin-left: 20px;">
                                            {{$comment->user->name}}
                                    </h4>
                                        {{$comment->commentText}}
                                    <hr>
                                </div>
                            </div>
                    @endforeach

                    {{-- Форма добавления комментария --}}
                    <div class="media">
                            <p class="pull-right" style="margin-right: 100px;">
                                <small>Добавить</small>
                            </p>
                            <a class="media-left" href="#">
                                <img src="{{asset('storage/'.$userAuth->imageAvatar)}}" width="50" height="50">
                            </a>
                            <div class="media-body" style="margin-left: 40px;">
                                
                                <h4 class="media-heading user_name" style="margin-left: 20px;">
                                    {{$userAuth->name}}
                                </h4>
                                

                                <form class="form-horizontal" action="{{route('comment.store')}}" method="POST">
                                    {{ csrf_field() }}
                                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Текст коментария">  </textarea>
                                    <input type="hidden" name="idUser" value="{{$userAuth->id}}">
                                    <input type="hidden" name="idTask" value="{{$task->id}}">
                                    <br>
                                    <input type="submit" class="btn btn-primary" value="Обуликовать">    
                                </form>


                                <hr>
                            </div>
                        </div>
                </div>   
            </div>
        </div>
    </div>
@endsection
