@extends('layouts.base', ['title' => 'Edit category'])

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit category</h1>
        <hr>
        <div class="row">
            <div class="col-md-8">
                <form action="/category/edit/{{ $category->slug }}" method="post">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input name="name" type="text" class="form-control" id="name" value="{{ old('name') ?? $category->name }}">
                        @error('title')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Edit category</button>
                </form>
            </div>
        </div>
    </div>
@endsection
