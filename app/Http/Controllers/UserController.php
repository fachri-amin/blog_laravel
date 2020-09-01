<?php

namespace App\Http\Controllers;


class UserController extends Controller
{
    public function login(){

        $title = 'Login';
        $context = [
            'title'=>$title
        ];

        return view('users/login', $context);
    }

    public function register(){

        $title = 'Register';
        $context = [
            'title'=>$title
        ];
        return view('users.register', $context);
    }
}
