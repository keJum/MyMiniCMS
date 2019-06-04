@extends('layouts.app')

@section('content')
<div class="container-fluid ">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-8" >
            <div class="card ">
                <div class="card-header">
                    <h1> Сообщение : {{$user->name}} </h1>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{@$message->link}}</h5>
                    <p class="card-text">
                        <ul class="list-unstyled">
                            @forelse (@$message as $item)
                                <li class="media" style="margin-bottom: 10px;">
                                    @if ($item->userSender->id == Auth::id())
                                        <img src="{{asset('/storage/'.$item->userSender->image_link)}}" class="mr-3" alt="..." width="50px" height="50px">
                                        <div class="media-body ">
                                            <h5 class="mt-0 mb-1">{{@$item->userSender->name }}</h5>
                                                <p style="	word-wrap: break-word;
                                                word-break: break-all;">{!!@$item->text!!}</p>
                                        </div>
                                    @else
                                    <div class="media-body text-right " style="margin-right: 10px;">
                                        <h5 class="mt-0 mb-1">{{@$item->userSender->name }}</h5>
                                        <p style="	word-wrap: break-word;
                                        word-break: break-all;"> {!!@$item->text!!}</p>
                                    </div>
                                    <img src="{{asset('/storage/'.$item->userSender->image_link)}}" class="mr-3" alt="..." width="50px" height="50px">
                                    @endif
                                </li>
                            @empty
                            @endforelse
                        </ul>
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text">
                                    <form class="form-horizontal" action="{{route('message.update',$userSend)}}" method="post">
                                        {{ csrf_field() }}
                                        {{-- {{ method_field('put') }} --}}
                                        @include('user_managment.message.partials.form')
                                    </form>
                                </p>
                            </div>
                        </div>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
