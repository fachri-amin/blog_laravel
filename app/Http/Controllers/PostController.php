<?php

namespace App\Http\Controllers;

use \App\Post; // ini agar class post bisa di gunakan, dengan memanggil namesapce nya
use \Illuminate\Http\Request;
use \App\Http\Requests\RequestPost;
use \App\Category;
use App\Comment;

class PostController extends Controller
{

    public function index(){
        $posts = Post::latest()->paginate(5);
        $all_category = Category::all();
        return view('posts.index', compact('posts', 'all_category'));
    }


    public function indexAdmin(){
        $posts = Post::latest()->paginate(5);
        return view('admin.posts.index', compact('posts'));
    }

    public function show($slug){ //samakan nama parameter yang mengisi method ini dengan wildcard yang ada di routing
        $post = Post::where('slug', $slug)->firstOrFail();// firstOrFail ini digunakan agar apabila data yang di cari tidak ada maka akan redirect ke 404 page

        $comments = Comment::where('post_id', $post->id)->latest()->get();

        $all_category = Category::all();

        return view('posts.show', compact('slug', 'post', 'all_category', 'comments'));
    }

    public function create(){
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(RequestPost $request){

        //membuat validasi
        $attr = $request->all();

        $request->validate([
            'thumbnail'=>'image|mimes:jpeg,jpg,png|max:2048',
        ]);

        //assign title ke slug
        $attr['slug'] = \Str::slug(request('title'));

        $thumbnail = request()->file('thumbnail') ? request()-> file('thumbnail')->store('images/posts') : null;

        $attr['thumbnail'] = $thumbnail;

        $post = auth()->user()->posts()->create($attr);

        session()->flash('success', 'The post new was created');
        
        return redirect($to = route('post'));
    }

    public function edit(Post $post){
        $this->authorize('update', $post);

        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(RequestPost $request, Post $post){

        //authorization
        $this->authorize('update', $post);

        $request->validate([
            'thumbnail'=>'image|mimes:jpeg,jpg,png|max:2048',
        ]);
            
        if(request()->file('thumbnail')){ //kalau thumbnail diganti maka thumbnail lama dihapus
            \Storage::delete($post->thumbnail);
            $thumbnail = request()-> file('thumbnail')->store('images/posts');
        }
        else{
            $thumbnail = $post->thumbnail;
        }

        $attr = $request->all(); // validasi dengan class RequestPost
        $attr['slug'] = \Str::slug(request('title'));

        $attr['thumbnail'] = $thumbnail;

        $post->update($attr);

        session()->flash('success', 'The post new was updated');
        
        return redirect($to = route('post'));
    }

    public function destroy(Post $post){

        $this->authorize('delete', $post);

        \Storage::delete($post->thumbnail);

        $post->delete();

        session()->flash('success', 'The post was delete');

        return redirect($to = route('post'));
    }
}
