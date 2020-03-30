<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'DashboardController@index')->name('dashboard')->middleware('auth');
Route::get('/certificate', 'CertificateController@index')->name('certificate.all')->middleware('auth');
Route::get('/certificate/add', 'CertificateController@add')->middleware('auth');
Route::post('/certificate/add', 'CertificateController@add')->middleware('auth');
Route::get('/certificate/edit/{id}', 'CertificateController@edit')->middleware('auth');
Route::post('/certificate/update', 'CertificateController@update')->middleware('auth');
Route::get('/certificate/delete/{id}', 'CertificateController@delete')->middleware('auth');

Route::get('/account', 'AccountController@index')->name('account.all')->middleware('auth');
Route::get('/account/add', 'AccountController@add')->middleware('auth');
Route::post('/account/add', 'AccountController@add')->middleware('auth');
Route::get('/account/edit/{id}', 'AccountController@edit')->middleware('auth');
Route::post('/account/update', 'AccountController@update')->middleware('auth');
Route::get('/account/delete/{id}', 'AccountController@delete')->middleware('auth');
Route::get('/account/lock/{id}/{value}', 'AccountController@lock')->middleware('auth');

Route::get('/logout', 'AuthenticationController@doLogout')->middleware('auth');
Route::get('/login', 'AuthenticationController@showLogin')->name("login");
Route::post('/login', 'AuthenticationController@doLogin');

// Password Reset Routes...
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::get('/home', function () {
    return redirect('/');
});

// Route::get('/frontend/academiccertificatechecker','FrontendCertController@index');
// Route::get('/frontend/academiccertificatecheckerresultpage','FrontendCertController@result');
// Route::post('/academic/ajax','FrontendCertController@find');