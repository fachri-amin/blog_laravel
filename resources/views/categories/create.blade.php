@extends('layouts.base', ['title' => 'New category'])

@section('content')
    <div class="container"  >
        <h1 class="mb-4">Create new category</h1>
        <hr>
        <div class="row">
            <div class="col-md-8">
                <form action="/category/save" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input name="name" type="text" class="form-control" id="name">
                        @error('title')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Add new category</button>
                </form>
            </div>
        </div>
    </div>
@endsection
