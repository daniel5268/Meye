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
Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/appinit', 'BossController@init');

Route::get('/password-reset', 'BossController@passwordResetForm')->name('passwordReset')->middleware('authWarning')->middleware('checkRole:admin');

Route::post('/password-reset', 'BossController@passwordReset')->middleware('authWarning')->middleware('checkRole:admin');

Route::get('/password-update', 'UserController@passwordUpdateForm')->name('passwordUpdate')->middleware('authWarning');


Route::post('/password-update', 'UserController@passwordUpdate')->name('passwordUpdate');


Route::get('/pj-create', 'ProfileController@createPjForm')->name('createPj')->middleware('authWarning');
Route::post('/pj-create', 'ProfileController@createPj')->name('createPj')->middleware('authWarning');

Route::get('/pj-list', 'ProfileController@listPjs')->name('listPjs')->middleware('authWarning');
Route::post('/pj-list', 'ProfileController@updatePj')->middleware('authWarning');

Route::get('/pjs-manage', 'MasterController@managePjForm')->name('managePj')->middleware('authWarning')->middleware('checkRole:master');

Route::post('/pjs-manage', 'MasterController@managePj')->name('managePj')->middleware('authWarning')->middleware('checkRole:master');

Route::post('/assignation', 'MasterController@assignation')->name('giveXp')->middleware('authWarning')->middleware('checkRole:master');