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
        Персональный id группы : {{@$department->id}} 
    </label>
    <hr>
@endisset

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <label for="">Имя</label>
            <input type="text" name="name" id="" placeholder="Имя" value="{{@$department->name}} " class="form-control" required>
            <label for="">Описание</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{@$department->description}}</textarea>
        </div>
        <div class="col-sm-6">
            <label for="">Сотрудники</label>
            @foreach ($users as $user)
                <div class="form-check">
                    
                    @if (@$department->id == @$user->department_id)
                        <input class="form-check-input" type="checkbox" name="users_id[]" value="{{$user->id}}" id="defaultCheck1" checked> 
                        <label class="form-check-label">
                            {{@$user->name}} роль: {{@$user->role->name}} 
                        </label>
                    @else  
                        <input class="form-check-input" type="checkbox" name="users_id[]" value="{{$user->id}}" >
                        <label class="form-check-label">
                            {{@$user->name}} роль: {{@$user->role->name}}
                        </label>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>
<hr>
<input type="submit" class="btn btn-primary" value="Сохранить">
