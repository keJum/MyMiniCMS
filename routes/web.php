<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * --------------------------
 * Статусы задачи:
 * 
 *  0   - задача на распределении   
 *  1   - задача на проверке
 *  2   - задача на переработки
 *  3   - задача прошла проверку 
 *  4   - задача потвердена 
 *  5   - задача в архиве 
 * ---------------------------------
 * Доступы пользователей :
 * 
 *  one     - доступ к изменению содержания задачи 
 *  two     - доступ к прогрессу задачи 
 *  tree    - доступ к проверки работы задачи
 *  four    - доступ к завершению задачи
 *  five    - доступ к отдлам 
 *  six     - доступ к пользователям
 *  seven   - доступ к ролям
 *  eight   - доступ к списку задач
 * ------------------------------------
 * Событие: 
 * 
 * crete   - создание задачи и отправка события подписанным
 * edit     - событие на измененеие задачи 
 * end     - событие на закрытие задачи 
 * combaek     - событие на возвращение задачи 
 * -----------------------------------------------------------
 */

Route::group(['prefix'=>'user_managment','middleware'=>['auth']],function(){
    Route::resource('user','UserController')->middleware('eight');
    Route::post('image/upload/{user}','UserController@uploadImageAvatar')->name('user.loadImage');
    Route::get('profile/show','UserController@showProfile')->name('user.showProfile');
    Route::get('profile/edit','UserController@editProfile')->name('user.editProfile');
    Route::get('profile/update','UserController@updateProfile')->name('user.updateProfile');
    Route::get('notification/index','UserController@notificationIndex')->name('notification.index');
    Route::get('notification/read/{user}','UserController@notificationRead')->name('notification.read');
    Route::get('notification/reading/{notification}}','UserController@notificationReading')->name('notification.reading');
    Route::post('notificoation/count','UserController@notificationList');
    Route::post('user/list','UserController@userList');
});
Route::group(['prefix'=>'role_managment'],function(){
    Route::resource('role','RoleController')->middleware('seven');
});
Route::group(['prefix'=>'file_manager','middleware'=>['auth']],function(){
    Route::post('load/{user}','FileloadController@load')->name('loadFile');
});
Route::group(['prefix'=>'department_managment'],function(){
    Route::resource('/department','DepartmentController',['as'=>'department_managment'])->middleware('five');
});
Route::group(['prefix'=>'task_managment','middleware'=>['auth']],function(){
    Route::resource('task','TaskController',['as'=>'task_managment']);
    Route::get('taskAll','TaskController@allIndex',['as'=>'task_managment'])->name('taskAll')->middleware('eight');
    Route::post('update/task','TaskController@selectTask',['as'=>'task_managment'])->name('selectTask');
    Route::get('/task/success/{task}/{str}','TaskController@success')->name('successTask');
    Route::get('/task/archive/index','TaskController@archiveIndex')->name('archive.index');
    Route::resource('comment','CommentController');
});
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/lineGet/json','HomeControlle@line');






Auth::routes();

Route::get('/home', 'HomeController@index',['middleware'=>['auth']])->name('home');

Route::get('/home/ajax','HomeController@ajax');




/**
 * AJAX to Vue.js
 */

Route::post('ajax/user','UserController@ajaxUser');
Route::post('ajax/userTask','TaskController@ajaxUserTask');
