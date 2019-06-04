@extends('layouts.app')

@section('content')
<div class="card" style="margin-right:1.9rem">
    <div class="card-header">
        <h1>Список сообщений</h1>
    </div>
    <div class="card-body">
        <p class="card-text">
            <ul class="list-unstyled">
                @forelse ($message as $item)
                    <li class="media">
                            <img src="{{asset('storage/'.$item->userSender->image_link)}}" class="mr-3" alt="avatar" width="50px" height="50px">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">{{$item->userSender->name}}</h5>
                                <a href="{{route('message.create',$item->userSender)}}">{!!$item->text!!} </a>
                            </div>
                    </li>
                    <br>                    
                @empty
                    <li> Сообщений нет </li>
                @endforelse

            </ul>
        </p>
    </div>
</div>
@endsection
