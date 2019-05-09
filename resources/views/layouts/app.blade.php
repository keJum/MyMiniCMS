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

    <script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js" integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    {{-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="text-right">
            @guest

            @else
                <a class="btn btn-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                    style="margin: 10px;">

                    Выход
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    {{-- <menu-burger-component
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
                    ></menu-burger-component> --}}

                    <menu-component></menu-component>
                </div>
                <div class="col-11" style="top: 60px;">
                    <main class="py-4">
                        @yield('content')
                        {{-- <modal-component></modal-component> --}}
                    </main>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
