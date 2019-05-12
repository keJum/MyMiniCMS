@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Текст сообщения"></textarea>
<br>
<input type="submit" class="btn btn-primary" value="Отпарвить">    

