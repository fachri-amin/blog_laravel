<?php

namespace App\Http\Controllers;

use \App\Post; // ini agar class post bisa di gunakan, dengan memanggil namesapce nya
use \Illuminate\Http\Request;
use \App\Http\Requests\RequestPost;
use \App\Category;

class PostController extends Controller
{

    public function index(){
        $posts = Post::latest()->paginate(5);
        $all_category = Category::all();
        return view('posts.index', compact('posts', 'all_category'));
    }

    public function show($slug){ //samakan nama parameter yang mengisi method ini dengan wildcard yang ada di routing
        $post = Post::where('slug', $slug)->firstOrFail();// firstOrFail ini digunakan agar apabila data yang di cari tidak ada maka akan redirect ke 404 page

        return view('posts.show', compact('slug', 'post'));
    }

    public function showUsingModelBinding(Post $post){
        return view('posts.show', compact('post'));
    }

    public function create(){
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function savePost(RequestPost $request){

        //membuat validasi
        $attr = $request->all();

        //assign title ke slug
        $attr['slug'] = \Str::slug(request('title'));

        $post = auth()->user()->posts()->create($attr);

        session()->flash('success', 'The post new was created');
        
        return redirect($to = route('post'));
    }

    public function edit(Post $post){
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
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
        
        return redirect($to = route('post'));
    }

    public function deletePost(Post $post){
        $post->delete();

        session()->flash('success', 'The post was delete');

        return redirect($to = route('post'));
    }
}
