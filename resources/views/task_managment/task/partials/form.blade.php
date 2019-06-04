@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4" style="margin-bottom: 10px;">
            {{-- -----------Изменение имени и описания у задач--------------------}}
            @if (preg_match('/1/',@$user->role->access))
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">
                            <label for="">Название</label>
                            <input type="text" name="name" id="" placeholder="" value="{{@$task->name}}" class="form-control" required>
                        
                            <label for="">Описание</label>
                            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"> {{@$task->description}} </textarea>
                        
                            <label for="exampleFormControlSelect1">Поставшик</label>
                            <select name="provider_id" class="form-control" id="exampleFormControlSelect1">
                                <option value="{{@$task->provider_id}}">{{@$task->provider->name}}</option>
                                <hr>
                                @foreach ($users as $userProvider)
                                    @if ($userProvider->name == @$task->provider->name)
                                        @continue
                                    @endif
                                    <option value="{{$userProvider->id}}">{{$userProvider->name}}</option>
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
                        
                            <label for="exampleFormControlSelect1">Отвественный</label>
                            <select name="respon_id" class="form-control" id="exampleFormControlSelect1">
                                <option value="{{@$task->respon_id}}">{{@$task->responsible->name}}</option>
                                <hr>
                                {{-- перебираем все группы  --}}
                                @foreach ($departments as $department)
                                    @foreach ($department->user as $userDepart)
                                        {{-- роли можно посмотреть в route/web.php --}}
                                        @if (strpos(@$userDepart->role->access,'4'))
                                            <option value="{{$userDepart->id}}">{{$userDepart->name}} - отдел ( {{$userDepart->department->name}} ) </option>
                                        @endif
                                    @endforeach
                                @endforeach
                            </select>
                            <br>
                            {{-- endTask указывает что задачу завершили  --}}
                            <a href="{{route('successTask',['task'=>$task,'str'=>'endTask'])}}" class="btn btn-success pull-right" onclick=""> Заврешить  задачу </a>
                            {{-- <form action="{{route('successTask',$task)}}" method="get">
                                <input type="hidden" name="str" value="endTask">
                                <input type="submit" class="btn btn-danger" value="Завершить задачу">
                            </form> --}}
                            <br>     
                            <input type="submit" class="btn btn-primary" value="Сохранить">    
                        </p>
                    </div>
                </div>
            @endif
        </div>
        <br>
        <div class="col-sm-4" style="margin-bottom: 10px;">
            {{-- -----------Работа с задачей--------------------}}
            @if (preg_match('/2/',@$user->role->access))
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">    
                            <label for="exampleFormControlSelect1">Прогресс</label>
                            <select name="progress" class="form-control" id="exampleSelect1">
                                <option {{@$task->progress == '1' ? 'selected="selected"': ''}}>1</option>
                                <option {{@$task->progress == '2' ? 'selected="selected"': ''}}>2</option>
                                <option {{@$task->progress == '3' ? 'selected="selected"': ''}}>3</option>
                                <option {{@$task->progress == '4' ? 'selected="selected"': ''}}>4</option>
                                <option {{@$task->progress == '5' ? 'selected="selected"': ''}}>5</option>
                            </select>
                        </p>
                        <input type="submit" class="btn btn-primary" value="Сохранить">    
                    </div>
                </div>
            @endif
        </div>
        <br>
        <div class="col-sm-4" style="margin-bottom: 10px;">
            {{-- -----------Проверки задачи--------------------}}
            @if (preg_match('/3/',@$user->role->access))
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">
                            <label for="exampleRadios1">Работает задача ? </label>       
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="exampleRadios3" value="1" checked>
                                <label class="form-check-label" for="exampleRadios3">
                                    Не проверинно 
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="2">
                                <label class="form-check-label" for="exampleRadios2">
                                    Не работает 
                                </label>
                            </div>        
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="3" >
                                <label class="form-check-label" for="exampleRadios1">
                                    Работает
                                </label>
                            </div>
                        </p>
                        <input type="submit" class="btn btn-primary" value="Сохранить">    
                    </div>
                </div>
            @endif
        </div>
        <br>
        <div class="col-sm-4">
            {{-- ----------------------------Контроль задач------------------------------------ --}}
            @if (preg_match('/4/',@$user->role->access))
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">
                                <label for="exampleFormControlSelect1">Разработчик</label>
                                <select name="developer_id" class="form-control" id="exampleFormControlSelect1">
                                    <option value="{{@$task->developer_id}}">{{@$task->developer->name}}</option>
                                    <hr>
                                    @foreach ($departments as $department)
                                        @foreach ($department->user as $userDepart)
                                            {{-- Разработка задач --}}
                                            @if (strpos(@$userDepart->role->access,'2'))
                                                <option value="{{$userDepart->id}}">{{$userDepart->name}} - отдел ( {{$userDepart->department->name}} )</option>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </select>
                                <label for="exampleFormControlSelect1">Тестер</label>
                                <select name="tester_id" class="form-control" id="exampleFormControlSelect1">
                                    <option value="{{@$task->tester_id}}">{{@$task->tester->name}}</option>
                                    <hr>
                                    @foreach ($departments as $department)
                                        @foreach ($department->user as $userProvider)
                                            {{-- sТестирование задач --}}
                                            @if (strpos(@$userProvider->role->access,'3'))
                                                <option value="{{$userProvider->id}}">{{$userProvider->name}} - отдел ( {{$userProvider->department->name}} )</option>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </select>
                                <label for="exampleFormControlSelect1">Сложность</label>
                                <select name="complexity" class="form-control" id="exampleSelect1">
                                    <option {{@$task->complexity == '1' ?' selected="selected"': ''}}>1</option>
                                    <option {{@$task->complexity == '2' ?' selected="selected"': ''}}>2</option>
                                    <option {{@$task->complexity == '3' ?' selected="selected"': ''}}>3</option>
                                    <option {{@$task->complexity == '4' ?' selected="selected"': ''}}>4</option>
                                    <option {{@$task->complexity == '5' ?' selected="selected"': ''}}>5</option>
                                </select>
                            
                                <br>    
                                {{-- readyTask указывает что задачу готово  --}}
                                <a href="{{route('successTask',['task'=>$task,'str'=>'readyTask'])}}" class="btn btn-success" onclick=""> Заврешить  задачу </a>
                        </p>
                        <input type="submit" class="btn btn-primary" value="Сохранить">    
                    </div>
                </div>
            @endif
        </div>
        <br>
    </div>
</div>
<input type="hidden" name="user" value="{{$user->id}}">











