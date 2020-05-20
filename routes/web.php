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

Route::get('/'  ,'IndexController@index')->name('home');
Route::get('about'  ,'IndexController@about')->name('about');
Route::get('blog'  ,'IndexController@blog')->name('blog');
Route::get('blog_details/{id}' ,'IndexController@blog_details')->name('blog_details');
Route::get('consultation'  ,'IndexController@consultation')->name('consultation');
Route::post('consultation'  ,'IndexController@consultation_post');
Route::get('contact'  ,'IndexController@contact')->name('contact');
Route::post('contact'  ,'IndexController@contact_post');
Route::get('filter'  ,'IndexController@filter')->name('filter');
Route::get('filter_details'  ,'IndexController@filter_details')->name('filter_details');
Route::get('profile'  ,'IndexController@profile')->name('profile');
Route::get('special'  ,'IndexController@special')->name('special');




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
