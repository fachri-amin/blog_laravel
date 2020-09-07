<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use App\Rating;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $all_posts = Post::all()->count();
        $all_categories = Category::all()->count();
        $all_comments = Comment::all()->count();
        $all_ratings = Rating::all()->count();


        return view('admin.index', compact('all_posts', 'all_categories', 'all_comments', 'all_ratings'));
    }
}
