<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', 'HomeController');

//user
Route::get('login', 'UserController@login'); // parameter pertama adalah route nya parameter kedua controller
Route::get('register', 'UserController@register'); // parameter pertama adalah route nya parameter kedua controller

//post
Route::get('show/{slug}', 'PostController@show'); //contoh menggunakan wildcard routing
