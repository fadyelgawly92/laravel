<?php

// use Symfony\Component\Routing\Annotation\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('posts', 'PostsController@index' )->name('posts.index')->middleware('auth');
Route::get('create', 'PostsController@create')->name('create.index')->middleware('auth');
Route::post('store', 'PostsController@store')->name('store.index')->middleware('auth');
Route::get('show/{id}', 'PostsController@show')->name('show.index')->middleware('auth');
Route::get('edit/{id}', 'PostsController@edit')->name('edit.index')->middleware('auth');
Route::put('edit/update/{id}', 'PostsController@update')->name('update.index')->middleware('auth');
Route::get('delete/{id}', 'PostsController@delete')->name('delete.index')->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//image
Route::get('storage/{filename}', function ($filename)
{
    return Image::make(storage_path('uploads' . $filename))->response();
});

Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');