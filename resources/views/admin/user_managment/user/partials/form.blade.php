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
        Персональный id 
        <div class="alert alert-primary" role="alert">
            {{@$user->id}}
          </div>
    </label>
    <hr>
@endif


{{-- <div class="form-group">
    <input type="file" name="imageAvatar" id="">
</div>
<button type="sudmit" class="btn btn-primary">Згарузить</button>

@isset($user->imageAvatar)
<img class="img-fluid" src="{{asset('/storage/'.$user->imageAvatar)}}" >
@endisset --}}


<label for="">Имя</label>
<input type="text" name="name" id="" placeholder="Имя" value="{{@$user->name}} " class="form-control" required>

<label for="">Email</label>
<input type="text" name="email" id="" placeholder="Email" value="{{@$user->email}}" class="form-control" required>

{{-- <label for="">role</label>
<input type="text" name="role" id="" placeholder="role" value="{{@$user->developer->role}}" class="form-control" required> --}}

<label for="exampleFormControlSelect1">role</label>
<select name="role" class="form-control" id="exampleFormControlSelect1">
    <option></option>
    <option {{@$user->role == 'Admin' ? 'selected="selected' : ''}} >Admin</option>
    <option {{@$user->role == 'Task manager' ? 'selected="selected' : ''}} >Task manager</option>
    <option {{@$user->role == 'Team lead' ? 'selected="selected' : ''}} >Team lead</option>
    <option {{@$user->role == 'Devoloper' ? 'selected="selected' : ''}} >Devoloper</option>
    <option {{@$user->role == 'Tester' ? 'selected="selected' : ''}} >Tester</option>
</select>


<label for="">Отдел</label>
<input type="text" name="appointment" id="" placeholder="Отдел" value="{{@$user->developer->appointment}}" class="form-control">

<label for="">Специальность</label>
<input type="text" name="specialty" id="" placeholder="Специальность" value="{{@$user->developer->specialty}}" class="form-control">

<label for="">Навыки</label>
<input type="text" name="skill" id="" placeholder="Навыки" value="{{@$user->developer->skill}}" class="form-control">

<label for="">Расписание</label>
<input type="text" name="schedule" id="" placeholder="Расписание" value="{{@$user->developer->schedule}}" class="form-control">


<label for="">Пароль</label>
<input type="password" name="password" id="" class="form-control">

<label for="">Потверждение</label>
<input type="password" name="password_confirmation" id="" class="form-control">

<hr>

<input type="submit" class="btn btn-primary" value="Сохранить">
