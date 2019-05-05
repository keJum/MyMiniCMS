{{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> --}}
<!------ Include the above in your HEAD tag ---------->

<!--
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
-->


            <div class="list-group ">
                @forelse ($users as $user)
                    <a href="{{route('user.show',$user)}}" class="list-group-item">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="media col-md-3">
                                    <figure class="pull-">
                                        <img class="img-fluid img-thumbnail" src="{{asset('storage/'.$user->image_link)}}" alt="Avatar" width="200px" height="200px">
                                    </figure>
                                </div>
                                <div class="col-md-5">
                                    <h4 class="list-group-item-heading">{{$user->name}}</h4>
                                    <p class="list-group-item-text">
                                        Отдел "{{@$user->department->name}}"  Почта"{{@$user->email}}"
                                    </p>
                                </div>
                                <div class="col-md-4 text-center">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="address">
                                                {{@$user->role->name}}                                        
                                            </div>     
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </a>
                @empty
                @endforelse
            </div>


