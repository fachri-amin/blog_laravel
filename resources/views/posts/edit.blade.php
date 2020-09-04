@extends('layouts.base', ['title' => 'Edit post'])

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Post</h1>
        <hr>
        <div class="row">
            <div class="col-md-8">
                <form action="/post/edit/{{ $post->slug }}" method="post" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        <label for="thumbnail" class="d-block">Thumbnail</label>
                        <img height="100" class="mb-4" src="{{ asset($post->showThumbnail()) }}" alt="">
                        <label class="text-muted">Current thumbnail</label>
                        <input class="form-control" type="file" name="thumbnail" id="thumbnail">
                        @error('thumbnail')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Title</label>
                        <input name="title" type="text" class="form-control" id="password" value="{{ old('title') ?? $post->title }}">
                        @error('title')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="body">Example textarea</label>
                        <textarea name="body" class="form-control" id="body" rows="3">{{ old('body') ?? $post->body }}</textarea>
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
                                <option {{ $post->category->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach    
                        </select>
                        @error('category_id')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary">edit post</button>
                </form>
            </div>
        </div>
    </div>
@endsection
