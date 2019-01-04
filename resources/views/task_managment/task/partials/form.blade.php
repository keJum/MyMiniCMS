@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<label for="">Название</label>
<input type="text" name="taskName" id="" placeholder="" value="{{@$task->taskName}}" class="form-control" required>


<label for="exampleFormControlSelect1">Исполнитель</label>
<select name="taskProvider_id" class="form-control" id="exampleFormControlSelect1">
    <option value="{{@$task->taskProvider_id}}">{{@$task->provider->name}}</option>
    <hr>
    @foreach ($users as $user)
        @if ($user->name == @$task->provider->name)
            @continue
        @endif
        <option value="{{$user->id}}">{{$user->name}}</option>
    @endforeach
</select>

<label for="exampleFormControlSelect1">Разработчик</label>
<select name="taskDeveloper_id" class="form-control" id="exampleFormControlSelect1">
    {{-- <option></option>
    @foreach ($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
    @endforeach --}}
    <option value="{{@$task->taskDeveloper_id}}">{{@$task->developer->name}}</option>
    <hr>
    @foreach ($users as $user)
        @if ($user->name == @$task->developer->name)
            @continue
        @endif
        <option value="{{$user->id}}">{{$user->name}}</option>
    @endforeach
</select>

<label for="exampleFormControlSelect1">Тестек</label>
<select name="taskTester_id" class="form-control" id="exampleFormControlSelect1">
    {{-- <option></option>
    @foreach ($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
    @endforeach --}}
    <option value="{{@$task->taskTester_id}}">{{@$task->tester->name}}</option>
    <hr>
    @foreach ($users as $user)
        @if ($user->name == @$task->tester->name)
            @continue
        @endif
        <option value="{{$user->id}}">{{$user->name}}</option>
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
<label for="exampleFormControlSelect1">Сложность</label>
<select name="taskComplexity" class="form-control" id="exampleSelect1">
    <option {{@$task->taskComplexity == '1' ?' selected="selected"': ''}}>1</option>
    <option {{@$task->taskComplexity == '2' ?' selected="selected"': ''}}>2</option>
    <option {{@$task->taskComplexity == '3' ?' selected="selected"': ''}}>3</option>
    <option {{@$task->taskComplexity == '4' ?' selected="selected"': ''}}>4</option>
    <option {{@$task->taskComplexity == '5' ?' selected="selected"': ''}}>5</option>
</select>
<label for="exampleFormControlSelect1">Прогресс</label>
<select name="taskProgress" class="form-control" id="exampleSelect1">
    <option {{@$task->taskProgress == '1' ? 'selected="selected"': ''}}>1</option>
    <option {{@$task->taskProgress == '2' ? 'selected="selected"': ''}}>2</option>
    <option {{@$task->taskProgress == '3' ? 'selected="selected"': ''}}>3</option>
    <option {{@$task->taskProgress == '4' ? 'selected="selected"': ''}}>4</option>
    <option {{@$task->taskProgress == '5' ? 'selected="selected"': ''}}>5</option>
</select>


<label for="">Начало разработки</label>
<input type="text" name="startDevelopment_at" id="" placeholder="дата" value="{{@$task->startDevelopment_at}}" class="form-control" required>


<label for="">Конец разработки</label>
<input type="text" name="finishDevelopment_at" id="" placeholder="дата" value="{{@$task->finishDevelopment_at}}" class="form-control" >


<label for="">Начало тестирования</label>
<input type="text" name="startTesting_at" id="" placeholder="дата" value="{{@$task->startTesting_at}}" class="form-control" required>


<label for="">Конец тестирования</label>
<input type="text" name="finishTesting_at" id="" placeholder="дата" value="{{@$task->finishTesting_at}}" class="form-control" >


<label for="">Задача зввершина</label>
<input type="text" name="finish_at" id="" placeholder="дата" value="{{@$task->finish_at}}" class="form-control" >

<hr>

<input type="submit" class="btn btn-primary" value="Сохранить">
