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
Route::get('/coming-soon', 'HomeController@comingSoon')->name('soon');
Route::get('/', 'HomeController@index')->name('utama');
Route::get('/berita/{berita}', 'HomeController@show')->name('berita.show');
Route::get('/rental', 'RentalController@index')->name('rental.index');
Route::post('/rental/barang-sewa', 'RentalController@cart')->name('rent.barang');
Route::get('/rental/cart', 'RentalController@showcart')->name('rent.cart');
Route::get('/rental/cart/{id}/edit', 'RentalController@edit')->name('rent.cart.edit');
Route::put('/rental/cart/{id}', 'RentalController@save_cart')->name('rent.cart.save');
Route::delete('/rental/cart/{id}', 'RentalController@destroy')->name('rent.cart.delete');
Route::put('/rental/cart/{id}/checkout', 'RentalController@checkOut')->name('cart.checkout');
Route::get('/rental/cart/checkoutConfirm', 'RentalController@checkOutConfirm')->name('cart.checkout.confirm');
Route::put('/rental/cart/{id}/checkoutConfirm', 'RentalController@updateStok')->name('cart.updateStok');
Route::get('/rental/transaksi', 'RentalController@transaksi')->name('rent.transaksi');
Route::get('/list-berita', 'HomeController@listBerita')->name('list.berita');
Route::put('/rental/transaksi/{id}', 'RentalController@transaksiUpload')->name('transaksiUpload');
//oprec
Route::get('/open-requirement/index', 'HomeController@showOprec')->name('openReq.show');
Route::get('/open-requirement/{berita}', 'HomeController@show')->name('openReq.form');
//fungsio
Route::get('/list-fungsionaris', 'HomeController@showFungsionaris')->name('list.fungsionaris');

Route::group(['prefix' => 'guest'], function () {
  Route::get('/checkAuth', 'ServiceController@checkAuth');
  Route::get('/login', 'GuestAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'GuestAuth\LoginController@login');
  Route::post('/logout', 'GuestAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'GuestAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'GuestAuth\RegisterController@register');

  Route::post('/password/email', 'GuestAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'GuestAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'GuestAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'GuestAuth\ResetPasswordController@showResetForm');

  Route::get('/setting/{id}/edit', 'GuestController@edit')->middleware('auth:guest')->name('setting.edit');
  Route::patch('/setting/{id}', 'GuestController@update')->middleware('auth:guest')->name('setting.update');

  Route::get('/setting/password/reset', 'GuestController@passResetForm')->middleware('auth:guest')->name('pass.resetForm');
  Route::post('/setting/password/reset', 'GuestController@passReset')->middleware('auth:guest')->name('pass.reset');
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
  Route::resource('barang','BarangController')->middleware('auth:admin');
  Route::resource('fungsionaris','FungsionarisController')->middleware('auth:admin');
  Route::resource('newsfeed','NewsfeedController')->middleware('auth:admin');
  Route::resource('guests','GuestController')->middleware('auth:admin');
  Route::resource('master-sie','SieController')->middleware('auth:admin');
  Route::resource('oprec','OprecController')->middleware('auth:admin');

  Route::get('/period', 'PeriodController@period')->middleware('auth:admin')->name('period.edit');
  Route::patch('/period/{id}', 'PeriodController@update')->middleware('auth:admin')->name('period.update');
  Route::get('/verif', 'VerifController@index')->middleware('auth:admin')->name('verif.index');
  Route::get('/verif/{id}', 'VerifController@show')->middleware('auth:admin')->name('verif.show');
  Route::post('/verif/sentEmail/{id}', 'VerifController@sendEmail')->middleware('auth:admin')->name('verif.approved');
  Route::post('/verif/decline/{id}', 'VerifController@decline')->middleware('auth:admin')->name('verif.decline');
});
