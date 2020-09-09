<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Comment, Post};
use App\Http\Requests\RequestComment;

class CommentController extends Controller
{
    public function index(){
        $comments = Comment::latest()->paginate(20);

        return view('admin.comments.index', compact('comments'));
    }

    public function search(){
        $query = request('query');

        $comments = Comment::where("comment", "like", "%$query%")->latest()->paginate(5);
        return view('admin.comments.index', compact('comments'));
    }

    public function store(RequestComment $request, Post $post){
        //membuat validasi
        $attr = $request->all();
        $attr['post_id'] = $post->id;
        $comments = auth()->user()->comments()->create($attr);

        session()->flash('success', 'You post a new comment to this page');
        
        return redirect($to = route('post.detail', $post->slug));
    }

    public function edit(Comment $comment){
        return view('admin.comments.edit', compact('comment'));
    }

    public function update(RequestComment $request, Comment $comment){
        $this->authorize('commentOwner', $comment);
        $attr = $request->all(); 
        $comment->update($attr);

        session()->flash('success', 'Edit success');
        
        return redirect($to = route('comment'));
    }

    public function destroy(Comment $comment){
        $this->authorize('commentOwner', $comment);
        
        $comment->delete();

        session()->flash('success', 'The Rating was delete');

        return redirect($to = route('comment'));
    }
}
