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

Route::get('/', 'HomeController@index');
Route::get('/berita/{berita}', 'HomeController@show')->name('berita.show');

Route::group(['prefix' => 'guest'], function () {
  Route::get('/login', 'GuestAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'GuestAuth\LoginController@login');
  Route::post('/logout', 'GuestAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'GuestAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'GuestAuth\RegisterController@register');

  Route::post('/password/email', 'GuestAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'GuestAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'GuestAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'GuestAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');

  //Route::get('/dashboard', 'AdminAuth\LoginController@index')->name('dashboard')->middleware('auth:admin');
  /*Route::get('dashboard', function () {
    return view('admin.dashboard');
  })->middleware('auth:admin');
  */

  Route::resource('kegiatan','KegiatanController')->middleware('auth:admin');
  Route::resource('fungsionaris','FungsionarisController')->middleware('auth:admin');
  Route::resource('newsfeed','NewsfeedController')->middleware('auth:admin');
  Route::resource('guest','GuestController')->middleware('auth:admin');
  Route::get('/period', 'PeriodController@period')->middleware('auth:admin')->name('period.edit');
  Route::patch('/period/{id}', 'PeriodController@update')->middleware('auth:admin')->name('period.update');
});
