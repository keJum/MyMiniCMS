@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card">
        <div class="card-header">
            <h1>База знаний</h1>
        </div>
        <div class="card-body">
            <p class="card-text">
                <div class="row">
                    <div class="col-3">
                        <div class="list-group" id="list-tab" role="tablist">
                            @forelse ($knows as $know)
                                <a class="list-group-item list-group-item-action " id="know-{{$know->id}}-list" 
                                    data-toggle="list" href="#know-{{$know->id}}" role="tab" aria-controls="{{$know->theme}}">

                                    {{$know->theme}}
                                </a>
                            @empty
                                Записей нет 
                            @endforelse
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="tab-content" id="nav-tabContent">
                            @foreach ($knows as $know)
                                <div class="tab-pane fade" id="know-{{$know->id}}"  role="tabpanel" 
                                    aria-labelledby="know-{{$know->id}}-list">

                                    

                                    <form onsubmit="if(confirm('Удалить?')){return true} else {return false} " action="{{route('knowledge.destroy',$know)}}" method="post">
                                        {{method_field('DELETE')}}
                                        {{ csrf_field() }}
                                        <a class="pull-left" href="{{route('knowledge.edit',$know)}}"><i class="fas fa-edit fa-2x  "></i></a>
                                        <button class="pull-right btn btn-danger" type="submit" ><i class="fas fa-trash"></i></button>
                                        <br>
                                    </form>  
                                    <br>
                                    <hr>
                                    {!! @$know->text !!}
                                </div>   
                            @endforeach
                        </div>
                    </div>
                </div>
            </p>
        </div>            
        <div class="card-footer">
            <a href="{{route('knowledge.create')}}" class="btn btn-primary pull-right">
                <i class="fas fa-plus-square"></i>
                Создать запись
            </a>
        </div>
    </div>
</div>
@endsection
{{-- 
<div class="row">
    <div class="col-4">
        <div class="list-group" id="list-tab" role="tablist">
        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Home</a>
        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
        <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messages</a>
        <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
        </div>
    </div>
    <div class="col-8">
        <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">...</div>
        <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">...</div>
        <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
        <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
        </div>
    </div>
</div> --}}