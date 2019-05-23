@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Изменение в базу знаний</h1>
    </div>
    <div class="card-body">
        <p class="card-text">
            <div class="container">
                <form action="{{route('knowledge.update',$know)}}" class="form-horizontal" method="post">
                    {{ csrf_field() }}
                    @include('know_managment.know.partials.form')
                    {{-- Необходимый hidden для resource --}}
                    <input type="hidden" name="_method" value="PUT">
                </form>    
            </div>    
        </p>
    </div>
</div>
    
@endsection