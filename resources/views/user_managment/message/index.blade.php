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
                        <img src="..." class="mr-3" alt="...">
                        <div class="media-body">
                        <h5 class="mt-0 mb-1">List-based media object</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
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
