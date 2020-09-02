<?php

namespace App\Http\Controllers;

use \App\Post; // ini agar class post bisa di gunakan, dengan memanggil namesapce nya
use \Illuminate\Http\Request;
use \App\Http\Requests\RequestPost;

class PostController extends Controller
{

    public function index(){
        $context = [
            'posts'=>Post::latest()->paginate(5),
        ];
        return view('posts.index', $context);
    }

    public function show($slug){ //samakan nama parameter yang mengisi method ini dengan wildcard yang ada di routing
        $post = Post::where('slug', $slug)->firstOrFail();// firstOrFail ini digunakan agar apabila data yang di cari tidak ada maka akan redirect ke 404 page

        $context = [
            'slug'=>$slug,
            'post'=>$post
        ];
        return view('posts.show', $context);
    }

    public function showUsingModelBinding(Post $post){
        return view('posts.show', compact('post'));
    }

    public function create(){
        return view('posts.create');
    }

    public function savePost(RequestPost $request){

        //membuat validasi
        $attr = $request->all();

        //assign title ke slug
        $attr['slug'] = \Str::slug(request('title'));

        Post::create($attr);

        session()->flash('success', 'The post new was created');
        
        return redirect($to = '/');
    }

    public function edit(Post $post){
        return view('posts.edit', compact('post'));
    }

    public function editPost(RequestPost $request, Post $post){

        //membuat validasi
        // $attr = request()->validate([
        //     'title'=>'required|min:5', // membuat field title menjadi required dan minimal 5 character
        //     'body'=>'required'
        // ]); //! ini dibuat dengan manual tanpa php artisan make:request

        $attr = $request->all(); // validasi dengan class RequestPost

        //assign title ke slug
        
        $attr['slug'] = \Str::slug(request('title'));

        $post->update($attr);

        session()->flash('success', 'The post new was updated');
        
        return redirect($to = '/');
    }

    public function deletePost(Post $post){
        $post->delete();

        session()->flash('success', 'The post was delete');

        return redirect($to = '/');
    }
}
