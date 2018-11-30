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

Route::get('/', [ 'as' => 'home', 'uses' => 'HomeController@index']);
Route::post('/contact', 'HomeController@store');
Route::get('/articles', [ 'as' => 'articles', 'uses' => 'ArticleController@index']);
Route::get('/articles/{article}', [ 'as' => 'article', 'uses' => 'ArticleController@show']);
Route::get('/projects', [ 'as' => 'projects', 'uses' => 'ArticleController@projects']);
Route::get('/projects/{project}', [ 'as' => 'project', 'uses' => 'ArticleController@showProject']);
Route::get('/landings/', ['uses' => 'LandingPageController@index']);
Route::get('/landing/{landing}', ['uses' => 'LandingPageController@show']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/dashboard', ['middleware' => 'auth', 'uses' => 'DashboardController@show']);