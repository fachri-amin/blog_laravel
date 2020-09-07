@extends('admin.includes.base_admin')

@section('content')
    <div class="card-body">
        <form action="{{ route('category.editCategory', $category->slug) }}" method="POST">
            @csrf
            @method('patch')
            <div class="form-group col-sm-4">
                <label for="name">Category</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ $category->name }}">
                @error('name')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <a href="#" class="btn btn-secondary">Cancel</a>
            <input name="submit" type="submit" value="Edit" class="btn btn-success">
        </form>
    </div>
@endsection