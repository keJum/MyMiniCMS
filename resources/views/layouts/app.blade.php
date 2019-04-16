<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/storage/fontAwesome/css/font-awesome.min.css">

    {{-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                    Войти
                                </a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))

                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('home')}}">
                                        Домой 
                                    </a>
                                    <a class="dropdown-item" href="{{route('task_managment.task.index')}}">
                                        Задачи 
                                    </a>
                                    <a class="dropdown-item" href="{{ route('user.showProfile') }}">
                                        Профиль 
                                    </a>
                                    <a href="{{route('notification.index')}}" class="dropdown-item">
                                        Уведомления
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       
                                        Выход
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}
        {{-- @dump(list(
                [
                    'title'=>'/lexa',
                    'url'=>'/lexa'
                ],
                [
                    'title'=>'/test'
                    'url'=>'/test'
                ]
            )) --}}
<div class="container-fluid">
    <div class="row">
        <div class="col-md-1 col-sm-12">
            <menu-burger-component
            v-bind:url-data="{{ json_encode([
                array(
                    'title' => 'Домой',
                    'url' => route('home'),
                    'icon' => 'fa fa-home'
                ),
                array(
                    'title' => 'Задачи',
                    'url' => route('task_managment.task.index'),
                    'icon' => 'fa fa-thumb-tack'
                ),
                array(
                    'title'=>'Профиль',
                    'url'=>route('user.showProfile'),
                    'icon' => 'fa fa-user' 
                ),
                array(
                    'title'=>'Уведомления',
                    'url'=>route('notification.index'),
                    'icon' => 'fa fa-bell-o'
                ),
                array(
                    'title'=>'Выйти',
                    'url'=>route('logout'),
                    'icon' => 'fa fa-exit'
                ),
                ])}}"
            ></menu-burger-component>
        </div>
        <div class="col-md-11 col-sm-12" style="top: 60px;">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>
</div>


    </div>

</body>
</html>
