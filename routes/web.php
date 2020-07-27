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



Route::namespace('Auth')->group(function(){
	Route::get('/', 'LoginController@showLoginForm')->name('home');
	Route::post('/', 'LoginController@login')->name('login');
	Route::post('logout', 'LoginController@logout')->name('logout');
	Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
	Route::post('register', 'RegisterController@register')->name('submit.register');
});


Route::namespace('Administrador')->middleware('admin')->prefix('admin')->group(function(){
	//Home
	Route::get('/home', 'HomeController@index')->name('administrador.home');

});


Route::namespace('Aluno')->middleware('aluno')->prefix('aluno')->group(function(){
	//Home
	Route::get('/home', 'HomeController@index')->name('aluno.home');

});

Route::namespace('Professor')->middleware('professor')->prefix('professor')->group(function(){
	//Home
	Route::get('/home', 'HomeController@index')->name('professor.home');

});

Route::namespace('Diretor')->middleware('diretor')->prefix('diretor')->group(function(){
	//Home
	Route::get('/home', 'HomeController@index')->name('diretor.home');

});
