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



/*  auth routes  */
Auth::routes();



/*  admin routes  */
// index
Route::get('/admin', 'AdminController@index');

// customizing
Route::get('/admin/customize', 'AdminController@customize');
Route::get('/admin/customize/general', 'AdminController@customizeGeneral');
Route::put('/admin/customize/general', 'AdminController@customizeGeneralUpdate');
Route::get('/admin/customize/navbar', 'AdminController@customizeNavbar');
Route::put('/admin/customize/navbar/{id}', 'AdminController@customizeNavbarUpdate');
Route::get('/admin/customize/header', 'AdminController@customizeHeader');
Route::put('/admin/customize/header', 'AdminController@customizeHeaderUpdate');
Route::get('/admin/customize/footer', 'AdminController@customizeFooter');
Route::put('/admin/customize/footer', 'AdminController@customizeFooterUpdate');
Route::get('/admin/customize/themes', 'AdminController@customizeThemes');

// posts
Route::get('/admin/posts', 'AdminController@posts');
Route::get('/admin/posts/create', 'AdminController@createPost');
Route::get('/admin/posts/{id}/edit', 'AdminController@editPost');

// users
Route::resource('/admin/users', 'UserController');
Route::put('/admin/user/{id}/image', 'UserController@selectUserAvater');

// pages
Route::resource('/admin/pages', 'PagesController');

// admin page color
Route::put('/admin/color/{url}', 'AdminController@setPageColor');



/* blog routes */
Route::resource('blog', 'PostsController');


/* contact routes */
// form
Route::get('/contact', 'MessagesController@contact');
Route::post('/contact/submit', 'MessagesController@submit');

// messages
Route::get('/admin/messages', 'AdminController@getMessages');
Route::get('/admin/messages/{id}', 'AdminController@showMessage');
Route::post('/admin/messages/reply', 'AdminController@replyMessage');





/* custom routes which are fetched from the database */
Route::get('/{url}', 'PagesController@custom');
