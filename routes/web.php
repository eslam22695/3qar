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

Route::get('/'  ,'IndexController@index')->name('index');
Route::get('about'  ,'IndexController@about')->name('about');
Route::get('blog'  ,'IndexController@blog')->name('blog');
Route::get('blog_details/{id}/{title}' ,'IndexController@blog_details')->name('blog_details');
Route::get('consultation'  ,'IndexController@consultation')->name('consultation');
Route::post('consultation'  ,'IndexController@consultation_post');
Route::get('contact'  ,'IndexController@contact')->name('contact');
Route::post('contact'  ,'IndexController@contact_post');
Route::get('special'  ,'IndexController@special')->name('special');

Route::get('items'  ,'IndexController@items')->name('items');
Route::get('filter'  ,'IndexController@items')->name('filter');
Route::get('item_details/{id}/{title}'  ,'IndexController@item_details')->name('item_details');


Route::get('/ajax_phone', 'IndexController@ajax_phone');
Route::get('/ajax_fav', 'IndexController@ajax_fav');
Route::get('/ajax_unfav', 'IndexController@ajax_unfav');

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
});

Auth::routes();

Route::Group(['middleware' => ['auth']], function () {

  Route::get('/home', 'IndexController@profile')->name('home');
  Route::get('/profile', 'IndexController@profile')->name('profile');
  Route::post('/profile', 'IndexController@edit_profile')->name('edit_profile');

});
