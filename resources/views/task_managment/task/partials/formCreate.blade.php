@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (@$task)
    <label for="">
        Номер задачи id :  {{@$task->id}}
    </label>
    <hr>
@endif
<label for="">Название</label>
<input type="text" name="taskName" id="" placeholder="" value="{{@$task->taskName}}" class="form-control" required>

<label for="">Описание</label>
<textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"> {{@$task->description}} </textarea>


<input type="hidden" name="taskProvider_id" value="{{$user->id}}">

<label for="exampleFormControlSelect1">Отвественный</label>
<select name="taskRespon_id" class="form-control" id="exampleFormControlSelect1">
    <option value="{{@$task->taskRespon_id}}">{{@$task->responsible->name}}</option>
    <hr>
    {{-- перебираем все отделы  --}}
    @foreach ($departments as $department)
        @foreach ($department->users as $user)
            <option value="{{$user->id}}">{{$user->name}} -- {{$user->roles->name}} </option>
        @endforeach
    @endforeach
</select>

<label for="exampleFormControlSelect1">Важность</label>
<select name="taskImportance" class="form-control" id="exampleSelect1">
    <option {{@$task->taskImportance == '1' ? 'selected="selected"': ''}}>1</option>
    <option {{@$task->taskImportance == '2' ? 'selected="selected"': ''}}>2</option>
    <option {{@$task->taskImportance == '3' ? 'selected="selected"': ''}}>3</option>
    <option {{@$task->taskImportance == '4' ? 'selected="selected"': ''}}>4</option>
    <option {{@$task->taskImportance == '5' ? 'selected="selected"': ''}}>5</option>
</select>

<hr>

<input type="submit" class="btn btn-primary" value="Сохранить">           
