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
/*  home route  */
Route::get('/', 'PagesController@home');

/*  admin routes  */
Auth::routes();

/*  admin routes  */
// index
Route::get('/admin', 'AdminController@index');

//customizing
Route::get('/admin/customize/navbar', 'AdminController@customizeNavbar');

// posts
Route::get('/admin/posts', 'AdminController@posts');
Route::get('/admin/posts/create', 'AdminController@createPost');
Route::get('/admin/posts/{id}/edit', 'AdminController@editPost');

// users
Route::resource('/admin/users', 'UserController');

// pages
Route::resource('/admin/pages', 'PagesController');

Route::resource('blog', 'PostsController');


/* custom routes which are fetched from the database */
Route::get('/{url}', 'PagesController@custom');
