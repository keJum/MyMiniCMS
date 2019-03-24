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
 * Управение пользователями 
 */
Route::group(['prefix'=>'user_managment'],function(){
    Route::resource('user','UserController');
    Route::post('image/upload/{user}','UserController@uploadImageAvatar')->name('user.loadImage');
    Route::get('profile/show','UserController@showProfile',['middleware'=>['auth']])->name('user.showProfile');
    Route::get('profile/edit','UserController@editProfile',['middleware'=>['auth']])->name('user.editProfile');
    Route::get('profile/update','UserController@updateProfile',['middleware'=>['auth']])->name('user.updateProfile');
    Route::post('image/upload/{user}','UserController@uploadImageAvatar')->name('user.loadImage');
});

Route::group(['prefix'=>'role_managment'],function(){
    Route::resource('role','RoleController');
});

Route::group(['prefix'=>'file_manager'],function(){
    Route::post('load/{user}','FileloadController@load')->name('loadFile');
});
/**
 * Управление отделами
 */
Route::group(['prefix'=>'department_managment'],function(){
    Route::resource('/department','DepartmentController',['as'=>'department_managment']);
});

/**
 * Управение задачами
 */
Route::group(['prefix'=>'task_managment'],function(){
    Route::resource('task','TaskController',['as'=>'task_managment']);
    Route::get('taskAll','TaskController@allIndex',['as'=>'task_managment'])->name('taskAll');
    Route::post('update/task','TaskController@selectTask',['as'=>'task_managment'])->name('selectTask');
    Route::get('task/next/{id}','TaskController@next',['as'=>'task_managment'])->name('next');
    Route::get('task/succes/{id}','TaskController@succsexTask',['as'=>'task_managment'])->name('succsecTask');
    Route::resource('comment','CommentController');
});


/**
 * Стандратные
 */
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index',['middleware'=>['auth']])->name('home');
