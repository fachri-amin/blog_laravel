<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\RequestCategory;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::latest()->paginate(5);
        return view('admin.categories.index', compact('categories'));
    }

    public function showPostPerCategory(Category $category){
        $posts = $category->posts()->latest()->paginate(5);
        $all_category = Category::all();
        return view('posts.index', compact('posts', 'category', 'all_category'));
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function saveCategory(RequestCategory $request){

        //membuat validasi
        $attr = $request->all();

        //assign name ke slug
        $attr['slug'] = \Str::slug(request('name'));

        Category::create($attr);

        session()->flash('success', 'The Category new was created');
        
        return redirect($to = route('category'));
    }

    public function edit(Category $category){
        return view('admin.categories.edit', compact('category'));
    }

    public function editCategory(RequestCategory $request, Category $category){

        $attr = $request->all(); 
        
        $attr['slug'] = \Str::slug(request('name'));

        $category->update($attr);

        session()->flash('success', 'The Category new was updated');
        
        return redirect($to = route('category'));
    }

    public function deleteCategory(Category $category){
        $category->delete();

        session()->flash('success', 'The Category was delete');

        return redirect($to = route('category'));
    }
}
