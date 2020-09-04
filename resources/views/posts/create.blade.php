@extends('layouts.base', ['title' => 'New post'])

@section('content')
    <div class="container"  >
        <h1 class="mb-4">Create new Post</h1>
        <hr>
        <div class="row">
            <div class="col-md-8">
                <form action="/post/save" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail</label>
                        <input class="form-control" type="file" name="thumbnail" id="thumbnail">
                        @error('thumbnail')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Title</label>
                        <input name="title" type="text" class="form-control" id="password">
                        @error('title')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="body">Example textarea</label>
                        <textarea name="body" class="form-control" id="body" rows="3"></textarea>
                        @error('body')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Example select</label>
                        <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Add new post</button>
                </form>
            </div>
        </div>
    </div>
@endsection
