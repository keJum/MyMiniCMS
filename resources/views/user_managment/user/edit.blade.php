@extends('layouts.app')
@section('content')
    <div class="container">
        {{-- Отправка изображения на сайт и получения ссылку  --}}
        @isset($user->image_link)
            <img src="{{asset('storage/'.$user->image_link)}}" class="mr-3" alt="Avatar">
        @endisset

        <form id="contactform" action="{{route('loadFile',$user)}}" method="post" class="validateform" name="send-contact" enctype="multipart/form-data"> 
            {{ csrf_field() }}
            <input type="hidden" name="type" value="avatar">
            <input type="file" name="image" >
            <input type="submit" value="Закачать">
        </form>
        {{-- / Отправка изображения на сайт и получения ссылку  --}}
        <form class="form-horizontal" action="{{route('user.update',$user)}}" method="post">
            <input name="_method" type="hidden" value="PATCH">
            {{ csrf_field() }}
            {{ method_field('put') }}
            @include('user_managment.user.partials.form')
        </form>
    </div>
@endsection


            {{-- 
            <script>
            $(document).ready(function(){
                $('#contactform').on('submit', function(e){
                    e.preventDefault();
                
                    $.ajax({
                        type: 'POST',
                        url: '/file_manager/load ',
                        data: $('#contactform').serialize(),
                        success: function(result){
                            console.log(result);
                        }
                    });
                });
            });
            </script> 
            --}}
