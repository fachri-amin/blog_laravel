<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Post, Rating};
use App\Http\Requests\RequestRating;

class RatingController extends Controller
{
    public function index(){
        $ratings = Rating::latest()->paginate(20);

        return view('admin.ratings.index', compact('ratings'));
    }

    // public function searchAdmin(){
    //     $query = request('query');

    //     $rating = Rating::post()->where("comment", "like", "%$query%")->latest()->paginate(5);
    //     return view('admin.comments.index', compact('comments'));
    // }

    public function store(RequestRating $request, Post $post){
        //membuat validasi
        $attr = $request->all();
        $attr['post_id'] = $post->id;
        $comments = auth()->user()->ratings()->create($attr);

        session()->flash('success', 'You post a new comment to this page');
        
        return redirect($to = route('post.detail', $post->slug));
    }

    public function edit(Rating $rating){
        return view('admin.ratings.edit', compact('rating'));
    }

    public function update(RequestRating $request, Rating $rating){
        $this->authorize('ratingOwner', $rating);
        $attr = $request->all(); 
        $rating->update($attr);

        session()->flash('success', 'Edit success');
        
        return redirect($to = route('rating'));
    }

    public function destroy(Rating $rating){

        $this->authorize('ratingOwner', $rating);

        $rating->delete();

        session()->flash('success', 'The Rating was delete');

        return redirect($to = route('rating'));
    }
}
