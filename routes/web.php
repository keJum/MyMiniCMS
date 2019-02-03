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
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']],function(){
    Route::get('/','DashboardController@dashboard')->name('admin.index');
    Route::group(['prefix'=>'user_managment','namespace'=>'UserManagment'],function(){
        Route::resource('/user','UserController',['as'=>'admin.user_managment']);
        Route::post('/image/upload/{user}','UserController@uploadImageAvatar')->name('user.loadImage');
    });
});

/**
 * Управение задачами
 */
Route::group(['prefix'=>'task_managment'],function(){
    Route::resource('/task','TaskController',['as'=>'task_managment']);
    Route::get('/taskAll','TaskController@allIndex',['as'=>'task_managment'])->name('taskAll');
    Route::post('/update/task','TaskController@selectTask',['as'=>'task_managment'])->name('selectTask');
    Route::get('/taskStatus/{id}','TaskController@nextTask',['as'=>'task_managment'])->name('nextTask');
});


/**
 * Стандратные
 */
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index',['middleware'=>['auth']])->name('home');



/**
 *  Редактирование и просмотр своей информации
 */
Route::group(['namespace'=>'Admin'],function(){
    Route::group(['namespace'=>'UserManagment'],function(){
        Route::get('/profile/{user}','UserController@show',['middleware'=>['auth']])->name('profile');
    });
});

Route::group(['namespace' => 'Admin'], function() {
    Route::group(['namespace' => 'UserManagment','middleware'=>['auth']], function() {
    Route::get('/profile','UserController@showProfile')->name('profile');
    Route::get('/edit/profile','UserController@editProfile')->name('editProfile');
    Route::post('/store/profile','UserController@updateProfile',['as'=>'admin.user_managment'])->name('storeProfileS');
    });
});

/**
 * Управление отдеениями
 */
Route::group(['prefix'=>'department_managment'],function(){
    Route::resource('/department','DepartmentController',['as'=>'department_managment']);
});

/**
 * Управние коментариями
 */

Route::resource('/comment','CommentController');