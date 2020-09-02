@extends('layouts.base', ['title' => 'Edit post'])

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Post</h1>
        <hr>
        <div class="row">
            <div class="col-md-8">
                <form action="/post/edit/{{ $post->slug }}" method="post">
                    @method('patch')
                    @csrf
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
                    <button class="btn btn-primary">edit post</button>
                </form>
            </div>
        </div>
    </div>
@endsection
