<?php

namespace App\Http\Controllers;

class PostController extends Controller
{
    public function show($slug){ //samakan nama parameter yang mengisi method ini dengan wildcard yang ada di routing
        $post = \DB::table('posts')->where('slug', $slug)->first();

        dd($post);
        
        $context = [
            'slug'=>$slug
        ];
        return view('posts/show', $context);
    }
}
