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

    public function edit(Comment $comment){
        return view('admin.comments.edit', compact('comment'));
    }

    public function editComment(RequestComment $request, Comment $comment){

        $attr = $request->all(); 
        $comment->update($attr);

        session()->flash('success', 'Edit success');
        
        return redirect($to = route('comment'));
    }

    public function deleteRating(Comment $comment){
        $comment->delete();

        session()->flash('success', 'The Rating was delete');

        return redirect($to = route('comment'));
    }
}
