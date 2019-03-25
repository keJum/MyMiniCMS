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
 *  0   - задача на распределении   
 *  1   - задача на проверки 
 *  2   - задача на переработки
 *  3   - задача работает 
 *  4   - задача потвердена 
 *  5   - задача в архиве 
 * ---------------------------------
 * Доступы пользователей :
 *  1   - доступ к изменению содержания задачи 
 *  2   - доступ к прогрессу задачи 
 *  3   - доступ к проверки работы задачи
 *  4   - доступ к завершению задачи
 *  5   - доступ к отдлам 
 *  6   - доступ к пользователям
 *  7   - доступ к ролям
 *  8   - доступ к списку задач
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
    // Route::get('task/next/{id}','TaskController@next',['as'=>'task_managment'])->name('next');
    Route::get('/task/success/{task}/{str}','TaskController@success')->name('successTask');
    // Route::get('task/succes/{id}','TaskController@succsex',['as'=>'task_managment'])->name('succsecTask');
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
