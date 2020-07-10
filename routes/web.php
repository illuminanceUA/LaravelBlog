<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes(['verify' => true]);
Route::get('posts/add', function () {

    return view('createpost');
});


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'PostController@index')->name('posts');
Route::get('/posts', 'PostController@index')->name('posts');

Route::get('/posts/{id}', 'PostController@show')->name('post_id');

Route::post('/posts/{id}/addComment', 'CommentController@store')->name('add_comment');
Route::post('/posts/{post_id}/like', 'PostController@like')->name('like');
Route::post('/posts/addPost', 'PostController@store')->name('/posts/add')->middleware('auth');







