@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<label for="">
    ID задачи  :  {{@$task->id}}
</label>

<hr>

<label for="">Название</label>
<input type="text" name="name" id="" placeholder="" value="{{@$task->name}}" class="form-control" required>

<label for="">Описание</label>
<textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"> {{@$task->description}} </textarea>

<label for="exampleFormControlSelect1">Поставшик</label>
<select name="provider_id" class="form-control" id="exampleFormControlSelect1">
    <option value="{{@$task->provider_id}}">{{@$task->provider->name}}</option>
    <hr>
    @foreach ($users as $user)
        @if ($user->name == @$task->provider->name)
            @continue
        @endif
        <option value="{{$user->id}}">{{$user->name}}</option>
    @endforeach
</select>

<label for="exampleFormControlSelect1">Отвественный</label>
<select name="respon_id" class="form-control" id="exampleFormControlSelect1">
    <option value="{{@$task->respon_id}}">{{@$task->responsible->name}}</option>
    <hr>
    @foreach ($users as $user)
        @if ($user->name == @$task->responsible->name)
            @continue
        @endif
        <option value="{{$user->id}}">{{$user->name}}</option>
    @endforeach
</select>

<label for="exampleFormControlSelect1">Разработчик</label>
<select name="developer_id" class="form-control" id="exampleFormControlSelect1">
    {{-- <option></option>
    @foreach ($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
    @endforeach --}}
    <option value="{{@$task->developer_id}}">{{@$task->developer->name}}</option>
    <hr>
    @foreach ($users as $user)
        @if ($user->name == @$task->developer->name)
            @continue
        @endif
        <option value="{{$user->id}}">{{$user->name}}</option>
    @endforeach
</select>

<label for="exampleFormControlSelect1">Тестер</label>
<select name="tester_id" class="form-control" id="exampleFormControlSelect1">
    {{-- <option></option>
    @foreach ($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
    @endforeach --}}
    <option value="{{@$task->tester_id}}">{{@$task->tester->name}}</option>
    <hr>
    @foreach ($users as $user)
        @if ($user->name == @$task->tester->name)
            @continue
        @endif
        <option value="{{$user->id}}">{{$user->name}}</option>
    @endforeach
</select>

<label for="exampleFormControlSelect1">Важность</label>
<select name="importance" class="form-control" id="exampleSelect1">
    <option {{@$task->importance == '1' ? 'selected="selected"': ''}}>1</option>
    <option {{@$task->importance == '2' ? 'selected="selected"': ''}}>2</option>
    <option {{@$task->importance == '3' ? 'selected="selected"': ''}}>3</option>
    <option {{@$task->importance == '4' ? 'selected="selected"': ''}}>4</option>
    <option {{@$task->importance == '5' ? 'selected="selected"': ''}}>5</option>
</select>
<label for="exampleFormControlSelect1">Сложность</label>
<select name="complexity" class="form-control" id="exampleSelect1">
    <option {{@$task->complexity == '1' ?' selected="selected"': ''}}>1</option>
    <option {{@$task->complexity == '2' ?' selected="selected"': ''}}>2</option>
    <option {{@$task->complexity == '3' ?' selected="selected"': ''}}>3</option>
    <option {{@$task->complexity == '4' ?' selected="selected"': ''}}>4</option>
    <option {{@$task->complexity == '5' ?' selected="selected"': ''}}>5</option>
</select>
<label for="exampleFormControlSelect1">Прогресс</label>
<select name="progress" class="form-control" id="exampleSelect1">
    <option {{@$task->progress == '1' ? 'selected="selected"': ''}}>1</option>
    <option {{@$task->progress == '2' ? 'selected="selected"': ''}}>2</option>
    <option {{@$task->progress == '3' ? 'selected="selected"': ''}}>3</option>
    <option {{@$task->progress == '4' ? 'selected="selected"': ''}}>4</option>
    <option {{@$task->progress == '5' ? 'selected="selected"': ''}}>5</option>
</select>

<hr>

<input type="submit" class="btn btn-primary" value="Сохранить">    


@switch($user->role)
    @case('Admin')
        <label for="">Название</label>
        <input type="text" name="taskName" id="" placeholder="" value="{{@$task->taskName}}" class="form-control" required>
        
        <label for="">Описание</label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"> {{@$task->description}} </textarea>
        
        <label for="exampleFormControlSelect1">Поставшик</label>
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
        
        <label for="exampleFormControlSelect1">Отвественный</label>
        <select name="taskRespon_id" class="form-control" id="exampleFormControlSelect1">
            <option value="{{@$task->taskRespon_id}}">{{@$task->responsible->name}}</option>
            <hr>
            @foreach ($users as $user)
                @if ($user->name == @$task->responsible->name)
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
        @break
    @case('Task manager')
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
                {{-- если найде с таким же именем то пропускаем --}}
                @if ($department->name == @$task->responsible->name)
                    @continue
                @endif
                {{-- перебираем имена, чтобы найти ip Team lead и  поствить на него задачу  --}}
                @foreach ($department->developer as $developer)
                    @if ($developer->user->role == 'Team lead')  
                        <option value="{{$developer->user->id}}">{{$department->name}}</option>
                    @endif
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
       
        @if (empty($task->taskProgress))
            <input type="hidden" name="taskProgress" value="0">
        @else
        <input type="hidden" name="taskProgress" value="{{ $task->taskProgress }}">
        @endif

        <hr>
        
        <input type="submit" class="btn btn-primary" value="Сохранить">    
        @break
    @case('Team lead')
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
                {{-- если найде с таким же именем то пропускаем --}}
                @if ($department->name == @$task->responsible->name)
                    @continue
                @endif
                {{-- перебираем имена, чтобы найти ip Team lead и  поствить на него задачу  --}}
                @foreach ($department->developer as $developer)
                    @if ($developer->user->role == 'Team lead')  
                        <option value="{{$developer->user->id}}">{{$department->name}}</option>
                    @endif
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
    
        @if (empty($task->taskProgress))
            <input type="hidden" name="taskProgress" value="0">
        @else
        <input type="hidden" name="taskProgress" value="{{ $task->taskProgress }}">
        @endif

        <hr>
        
        <input type="submit" class="btn btn-primary" value="Сохранить">    
        @break
    @default
        
@endswitch
