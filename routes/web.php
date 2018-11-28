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
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth']],function(){
    Route::get('/','DashboardController@dashboard')->name('admin.index');
    Route::group(['prefix'=>'user_managment','namespace'=>'UserManagment'],function(){
        Route::resource('/user','UserController',['as'=>'admin.user_managment']);
    });
});

Route::group(['prefix'=>'developer','namespace'=>'Developer','middleware'=>['auth','developer']],function(){
    // Route::get('/','DashboardController@dashboard')->name('developer.index');
});

Route::group(['prefix'=>'seniorDeveloper','namespace'=>'SeniorDeveloper','middleware'=>['auth','seniorDeveloper']],function(){
    // Route::get('/','DashboardController@dashboard')->name('seniorDeveloper.index');
});

Route::group(['prefix'=>'tester','namespace'=>'Tester','middleware'=>['auth','tester']],function(){
    // Route::get('/','DashboardController@dashboard')->name('tester.index');
});



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
