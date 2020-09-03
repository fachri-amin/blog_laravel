<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


// //USER
// Route::get('login', 'UserController@login')->name('login'); // parameter pertama adalah route nya parameter kedua controller
// Route::get('register', 'UserController@register'); // parameter pertama adalah route nya parameter kedua controller


Route::prefix('post')->middleware('auth')->group(function(){
    //create
    Route::get('create', 'PostController@create')->name('post.create');
    Route::post('save', 'PostController@savePost')->name('post.save');
    //update
    Route::get('edit/{post:slug}', 'PostController@edit')->name('post.edit');
    Route::patch('edit/{post:slug}', 'PostController@editPost')->name('post.editPost');
    //delete
    Route::delete('delete/{post:slug}', 'PostController@deletePost')->name('post.delete');
});

//POST
Route::get('/post', 'PostController@index')->name('post');
//detail
Route::get('post/{slug}', 'PostController@show')->name('post.detail'); //contoh menggunakan wildcard routing
Route::get('showUsingModelBinding/{post:slug}', 'PostController@showUsingModelBinding'); //contoh menggunakan wildcard routing dengan model binding


Route::prefix('category')->middleware('auth')->group(function(){
    //create
    Route::get('create', 'CategoryController@create')->name('category.create');
    Route::post('save', 'CategoryController@saveCategory')->name('category.save');
    //update
    Route::get('edit/{category:slug}', 'CategoryController@edit')->name('category.edit');
    Route::patch('edit/{category:slug}', 'CategoryController@editCategory')->name('category.editCategory');
    //delete
    Route::delete('delete/{category:slug}', 'CategoryController@deleteCategory')->name('category.delete');
});

//CATEGORY
Route::get('category/', 'CategoryController@index')->name('category');
//showPostPerCategory
Route::get('category/{category:slug}', 'CategoryController@showPostPerCategory')->name('category.showPostPerCategory');

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

