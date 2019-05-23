@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<label for="theme">Тема</label>
<input type="text" name="theme" id="theme" value="{{@$know->theme}}" class="form-control" required >

<label for="text">Текст</label>
<textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3" > 
    {!! @$know->text!!} 
</textarea>

<hr>

<input type="submit" class="btn btn-primary" value="Сохранить">
 