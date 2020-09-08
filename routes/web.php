<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::get('/', 'HomeController@index')->name('home');

// autentikasi
Auth::routes(['verify' => true,]);

Route::group(['middleware'=> ['auth', 'verified'],], function(){
    Route::prefix('post')->group(function(){
        //admin
        Route::get('admin', 'PostController@indexAdmin')->name('post.admin');
        //create
        Route::get('create', 'PostController@create')->name('post.create');
        Route::post('save', 'PostController@store')->name('post.save');
        //update
        Route::get('edit/{post:slug}', 'PostController@edit')->name('post.edit');
        Route::patch('edit/{post:slug}', 'PostController@update')->name('post.editPost');
        //delete
        Route::delete('delete/{post:slug}', 'PostController@destroy')->name('post.delete');
    });

    Route::prefix('category')->group(function(){
        Route::get('', 'CategoryController@index')->name('category');
        //create
        Route::get('create', 'CategoryController@create')->name('category.create');
        Route::post('save', 'CategoryController@store')->name('category.save');
        //update
        Route::get('edit/{category:slug}', 'CategoryController@edit')->name('category.edit');
        Route::patch('edit/{category:slug}', 'CategoryController@update')->name('category.editCategory');
        //delete
        Route::delete('delete/{category:slug}', 'CategoryController@destroy')->name('category.delete');
    });

    Route::prefix('comment')->group(function(){
        Route::get('', 'CommentController@index')->name('comment');
        Route::post('save/{post}', 'CommentController@store')->name('comment.saveComment');
        Route::get('edit/{comment}', 'CommentController@edit')->name('comment.edit');
        Route::post('editComment/{comment}', 'CommentController@update')->name('comment.editComment');
        Route::post('delete/{comment}', 'CommentController@destroy')->name('comment.delete');
    });

    Route::prefix('rating')->group(function(){
        Route::get('', 'RatingController@index')->name('rating');
        Route::post('save/{post}', 'RatingController@store')->name('rating.saveRating');
        Route::get('edit/{rating}', 'RatingController@edit')->name('rating.edit');
        Route::post('editRating/{rating}', 'RatingController@update')->name('rating.editRating');
        Route::post('delete/{rating}', 'RatingController@destroy')->name('rating.delete');
    });

    Route::get('admin', 'AdminController@index')->name('admin');
    
    Route::prefix('user')->group(function(){
        Route::get('', 'UserController@index')->name('user');
        Route::post('delete/{user}', 'UserController@destroy')->name('user.delete');
    });
    
    Route::get('admin', 'AdminController@index')->name('admin');
});

//POST
Route::get('/post', 'PostController@index')->name('post');
//detail
Route::get('post/{slug}', 'PostController@show')->name('post.detail'); //contoh menggunakan wildcard routing

//CATEGORY
//showPostPerCategory
Route::get('category/{category:slug}', 'CategoryController@showPostPerCategory')->name('category.showPostPerCategory');

