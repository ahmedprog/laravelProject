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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('forums', 'ForumController');
Route::resource('posts', 'PostController');
Route::resource('comments', 'CommentController');
Route::resource('users', 'UserController');

Route::get('profile','DashboardController@profile');
Route::post('profile','DashboardController@uploadPhoto');

Route::get('posts/create/{forum_id}','PostController@create');
Route::group(['middleware'=>['isAdmin']],function(){
    Route::get('/admin', 'AdminController@index')->name('admin.index');    
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/api/{name}','ApiController');