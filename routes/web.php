<?php
/**
 * Маршруты главной страницы
 */
Route::get('/', function () {
    return view('welcome');
});
/**
 * Маршруты домашней страницы
 */
Route::get('/home', 'HomeController@index',['middleware'=>['auth']])->name('home');
/**
 * Маршруты по авторизации пользователя
 */
Auth::routes();
/**
 * Маршруты по работе с пользователями 
 */
Route::group(['prefix'=>'user_managment','middleware'=>['auth']],function(){
    Route::resource('user','UserController');
    Route::post('image/upload/{user}','UserController@uploadImageAvatar')->name('user.loadImage');
    Route::get('profile/show','UserController@showProfile')->name('user.showProfile');
    Route::get('profile/edit','UserController@editProfile')->name('user.editProfile');
    Route::get('profile/update','UserController@updateProfile')->name('user.updateProfile');
    Route::get('notification/index','UserController@notificationIndex')->name('notification.index');
    Route::get('notification/read/{user}','UserController@notificationRead')->name('notification.read');
    Route::get('notification/reading/{notification}}','UserController@notificationReading')->name('notification.reading');
    Route::post('notificoation/count','UserController@notificationList');
    Route::post('user/list','UserController@userList');
    Route::get('message/index','MessageController@index')->name('message.index');
    Route::get('message/create/{user}','MessageController@create')->name('message.create');
    Route::post('message/update/{user}','MessageController@update')->name('message.update');
});
/**
 * Маршруты по работе с базой данных
 */
Route::group(['prefix'=>'know_managment','middleware'=>['auth']],function(){
    Route::resource('knowledge',"KnowledgeController");
});
/**
 * Маршруты по работе с ролями пользователя
 */
Route::group(['prefix'=>'role_managment'],function(){
    Route::resource('role','RoleController')->middleware('seven');
});
/**
 * Маршруты по работе с файлами
 */
Route::group(['prefix'=>'file_manager','middleware'=>['auth']],function(){
    Route::post('load/{user}','FileloadController@load')->name('loadFile');
});
/**
 * Маршруты по работе с группами пользователей
 */
Route::group(['prefix'=>'department_managment'],function(){
    Route::resource('/department','DepartmentController',['as'=>'department_managment'])->middleware('five');
});
/**
 * Маршруты по работе с задачей
 */
Route::group(['prefix'=>'task_managment','middleware'=>['auth']],function(){
    Route::resource('task','TaskController',['as'=>'task_managment']);
    Route::get('taskAll','TaskController@allIndex',['as'=>'task_managment'])->name('taskAll')->middleware('eight');
    Route::post('update/task','TaskController@selectTask',['as'=>'task_managment'])->name('selectTask');
    Route::get('/task/success/{task}/{str}','TaskController@success')->name('successTask');
    Route::get('/task/archive/index','TaskController@archiveIndex')->name('archive.index');
    Route::resource('comment','CommentController');
});
/**
 * Маршруты для ajax запросов
 */
Route::get('/home/ajax','HomeController@ajax');
Route::post('ajax/user','UserController@ajaxUser');
Route::post('ajax/userTask','TaskController@ajaxUserTask');
