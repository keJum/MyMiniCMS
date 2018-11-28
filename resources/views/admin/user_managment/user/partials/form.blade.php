@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<label for="">Имя</label>
<input type="text" name="name" id="" placeholder="Имя" value="{{@$user->name}} " class="form-control" required>

<label for="">Email</label>
<input type="text" name="email" id="" placeholder="Email" value="{{@$user->email}}" class="form-control" required>

<label for="">Отдел</label>
<input type="text" name="appointment" id="" placeholder="Отдел" value="{{@$user->appointment}}" class="form-control">

<label for="">Специальность</label>
<input type="text" name="specialty" id="" placeholder="Специальность" value="{{@$user->specialty}}" class="form-control">

<label for="">Навыки</label>
<input type="text" name="skill" id="" placeholder="Навыки" value="{{@$user->skill}}" class="form-control">

<label for="">Пароль</label>
<input type="password" name="password" id="" class="form-control">

<label for="">Потверждение</label>
<input type="password" name="password_confirmation" id="" class="form-control">

<hr>

<input type="submit" class="btn btn-primary" value="Сохранить">
