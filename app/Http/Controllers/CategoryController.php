<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\RequestCategory;

class CategoryController extends Controller
{
    public function index(){
        $context = [
            'categories'=>Category::latest()->paginate(5),
        ];
        return view('categories.index', $context);
    }

    public function create(){
        return view('categories.create');
    }

    public function saveCategory(RequestCategory $request){

        //membuat validasi
        $attr = $request->all();

        //assign name ke slug
        $attr['slug'] = \Str::slug(request('name'));

        Category::create($attr);

        session()->flash('success', 'The Category new was created');
        
        return redirect($to = '/category');
    }

    public function edit(Category $category){
        return view('categories.edit', compact('category'));
    }

    public function editCategory(RequestCategory $request, Category $category){

        $attr = $request->all(); 
        
        $attr['slug'] = \Str::slug(request('name'));

        $category->update($attr);

        session()->flash('success', 'The Category new was updated');
        
        return redirect($to = '/category');
    }

    public function deleteCategory(Category $category){
        $category->delete();

        session()->flash('success', 'The Category was delete');

        return redirect($to = '/category');
    }
}