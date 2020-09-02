<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


//USER
Route::get('login', 'UserController@login'); // parameter pertama adalah route nya parameter kedua controller
Route::get('register', 'UserController@register'); // parameter pertama adalah route nya parameter kedua controller


//POST
Route::get('/', 'PostController@index');
//create
Route::get('post/create', 'PostController@create');
Route::post('post/save', 'PostController@savePost');
//update
Route::get('post/edit/{post:slug}', 'PostController@edit');
Route::patch('post/edit/{post:slug}', 'PostController@editPost');
//delete
Route::delete('post/delete/{post:slug}', 'PostController@deletePost');
//detail
Route::get('post/{slug}', 'PostController@show'); //contoh menggunakan wildcard routing
Route::get('showUsingModelBinding/{post:slug}', 'PostController@showUsingModelBinding'); //contoh menggunakan wildcard routing dengan model binding


//CATEGORY
Route::get('category/', 'CategoryController@index');
//create
Route::get('category/create', 'CategoryController@create');
Route::post('category/save', 'CategoryController@saveCategory');
//update
Route::get('category/edit/{category:slug}', 'CategoryController@edit');
Route::patch('category/edit/{category:slug}', 'CategoryController@editCategory');
//delete
Route::delete('category/delete/{category:slug}', 'CategoryController@deleteCategory');