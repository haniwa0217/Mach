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

use Illuminate\Support\Facades\Route; 

// ユーザーがログインしている状態でのみ表示させたいので、 'middleware' => 'auth' と表記することで、認証済か判定。
//editにアクセスすることで編集画面を表示し、 updateにアクセスすことで情報の更新。
Route::group(['prefix' => 'users', 'middleware' => 'auth'], function () {
    Route::get('show/{id}', 'UserController@show')->name('users.show');
    Route::get('edit/{id}', 'UserController@edit')->name('users.edit');
    Route::post('update/{id}', 'UserController@update')->name('users.update');
});

Auth::routes();

Route::get('/', function () {
    return view('top');
});


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/matching','MatchingController@index')->name('matching'); //→MatchingControllerの編集へ


/*
|--------------------------------------------------------------------------
| 3) Admin 認証不要
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin'], function() {
    Route::get('/',function () { return redirect('/admin/home'); });
    Route::get('login','Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login','Admin\LoginController@login');
});


/*
|--------------------------------------------------------------------------
| 4) Admin ログイン後
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');
    Route::get('home','Admin\HomeController@index')->name('admin.home');
});