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
 * Users
 */
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']],function(){
    Route::get('/','DashboardController@dashboard')->name('admin.index');
    Route::group(['prefix'=>'user_managment','namespace'=>'UserManagment'],function(){
        Route::resource('/user','UserController',['as'=>'admin.user_managment']);
        Route::post('/image/upload/{user}','UserController@uploadImageAvatar')->name('user.loadImage');
    });
});

// Route::group(['prefix'=>'developer','namespace'=>'Developer','middleware'=>['auth','developer']],function(){
//     // Route::get('/','DashboardController@dashboard')->name('developer.index');
// });

// Route::group(['prefix'=>'teamLead','namespace'=>'TeamLead','middleware'=>['auth','teamLead']],function(){
//     // Route::get('/','DashboardController@dashboard')->name('seniorDeveloper.index');
// });

// Route::group(['prefix'=>'tester','namespace'=>'Tester','middleware'=>['auth','tester']],function(){
//     // Route::get('/','DashboardController@dashboard')->name('tester.index');
// });

// Route::group(['prefix'=>'taskManager','namespace'=>'TaskManager','middleware'=>['auth','taskManager']],function(){
//     // Route::get('/','DashboardController@dashboard')->name('tester.index');
// });


Route::group(['prefix'=>'task_managment'],function(){
    Route::resource('/task','TaskController',['as'=>'task_managment']);
    Route::get('/taskAll','TaskController@allIndex',['as'=>'task_managment'])->name('taskAll');
    Route::post('/update/task','TaskController@selectTask',['as'=>'task_managment'])->name('selectTask');
    Route::get('/taskStatus/{id}','TaskController@nextTask',['as'=>'task_managment'])->name('nextTask');
});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index',['middleware'=>['auth']])->name('home');

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

Route::group(['prefix'=>'department_managment'],function(){
    Route::resource('/department','DepartmentController',['as'=>'department_managment']);
});