@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

@isset($department->id)
    <label for="">
        Персональный id отдела : {{@$department->id}} 
    </label>
    <hr>
@endisset


{{-- <div class="form-group">
    <input type="file" name="imageAvatar" id="">
</div>
<button type="sudmit" class="btn btn-primary">Згарузить</button>

@isset($user->imageAvatar)
<img class="img-fluid" src="{{asset('/storage/'.$user->imageAvatar)}}" >
@endisset --}}



<label for="">Имя</label>
<input type="text" name="name" id="" placeholder="Имя" value="{{@$department->name}} " class="form-control" required>

<label for="">Описание</label>
<textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{@$department->description}}</textarea>

<label for="">Сотрудники</label>
@foreach ($users as $user)
    <div class="form-check">
        
        @if (@$department->id == @$user->developer->department_id)
            <input class="form-check-input" type="checkbox" name="taskRespon_id[]" value="{{$user->id}}" id="defaultCheck1" checked> 
            <label class="form-check-label">
                {{@$user->name}} роль: {{@$user->role}} 
            </label>
        @else  
            <input class="form-check-input" type="checkbox" name="taskRespon_id[]" value="{{$user->id}}" >
            <label class="form-check-label">
                {{@$user->name}} роль: {{@$user->role}}
            </label>
        @endif
    </div>
@endforeach


<hr>

<input type="submit" class="btn btn-primary" value="Сохранить">
