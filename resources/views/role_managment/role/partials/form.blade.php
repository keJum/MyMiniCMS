@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (@$user)
    <label for="">
        Персональный id : {{@$role->id}} 
    </label>
    <hr>
@endif


<label for="name">Название</label>
<input type="text" name="name" id="name" value="{{@$role->name}} " class="form-control" required>

<label for="describe">Описание</label>
<input type="text" name="describe" id="describe" value="{{@$role->describe}}" class="form-control" required>

<label for="users"> Пользователи </label>
<div id="users" class="form-check">
    @foreach ($users as $user)
    
        <input class="form-check-input" type="checkbox" value="{{$user->id}}" name="users[]" id="defaultCheck{{@$user->id}}" {{(@$user->role == @$role->id) ? 'checked':''}}>
        <label class="form-check-label" for="defaultCheck{{@$user->id}}" >
            {{-- {{var_dump($user->role)}} --}}
            {{$user->name}} 
           
        
            {{-- @isset($user->roles->name)
                пользователя уже имеет роль   {{$user->roles->name}}
            @endisset --}}
        </label>
        <br>
    @endforeach
</div>


<hr>

<label for="access"> Доступы </label>
<div id="access" class="form-check">
    <br>
    <input class="form-check-input" type="checkbox" value="1" name="access[]" id="defaultCheck1" {{(strpos(@$role->access,'1') !== false) ? 'checked':''}}>
    <label class="form-check-label" for="defaultCheck1" >
        Составление задач
    </label> 
    <br>
    <input class="form-check-input" type="checkbox" value="2" id="defaultCheck1" name="access[]" {{(strpos(@$role->access,'2') !== false) ? 'checked':''}}>
    <label class="form-check-label" for="defaultCheck1" >
        Разработка задач
    </label>
    <br>
    <input class="form-check-input" type="checkbox" value="3" id="defaultCheck1" name="access[]" {{(strpos(@$role->access,'3') !== false) ? 'checked':''}}>
    <label class="form-check-label" for="defaultCheck1">
        Тестирование задач
    </label>
    <br>
    <input class="form-check-input" type="checkbox" value="4" id="defaultCheck1" name="access[]" {{(strpos(@$role->access,'4') !== false) ? 'checked':''}}>
    <label class="form-check-label" for="defaultCheck1">
        Контроль задач
    </label>
    <br>
    <input class="form-check-input" type="checkbox" value="5" id="defaultCheck1" name="access[]" {{(strpos(@$role->access,'5') !== false) ? 'checked':''}}>
    <label class="form-check-label" for="defaultCheck1">
        Доступ к отделам 
    </label>
    <br>
    <input class="form-check-input" type="checkbox" value="6" id="defaultCheck1" name="access[]" {{(strpos(@$role->access,'6') !== false) ? 'checked':''}}>
    <label class="form-check-label" for="defaultCheck1">
        Доступ к пользователям
    </label>
    <br>
    <input class="form-check-input" type="checkbox" value="7" id="defaultCheck1" name="access[]" {{(strpos(@$role->access,'7') !== false) ? 'checked':''}} >
    <label class="form-check-label" for="defaultCheck1">
        Доступ к ролям
    </label>
    <br>
    <input class="form-check-input" type="checkbox" value="8" id="defaultCheck1" name="access[]" {{(strpos(@$role->access,'8') !== false) ? 'checked':''}}>
    <label class="form-check-label" for="defaultCheck1">
        Доступ ко всем задачам
    </label>
    
</div>


<hr>

<input type="submit" class="btn btn-primary" value="Сохранить">
