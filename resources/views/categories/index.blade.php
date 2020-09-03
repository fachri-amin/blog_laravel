@extends('layouts.base')

@section('content')
    <div class="container"  >
        <h1 class="mb-4">All category</h1>
        <hr>
        <div class="row">
            <div class="col-md-8">
                @foreach ($categories as $category)
                    <div class="card mb-5">
                        <div class="card-header">
                            <h3>{{ $category->name }}</h3>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <p class="text-muted">Published on {{ $category->created_at->diffForHumans() }}</p>
                            @auth
                                <div>
                                    <a href="/category/edit/{{ $category->slug }}" class="btn btn-warning">Edit</a>
                                    <form class="d-inline" action="/category/delete/{{ $category->slug }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="return confirm('Ingin mengapus category ini?')" href="" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>    
                            @endauth
                        </div>
                    </div>
                @endforeach
                {{ $categories->links() }}
            </div>
            @auth
                <div class="col-md-4">
                    <a href="/category/create" class="btn btn-primary">New category</a>
                </div>    
            @endauth
        </div>
    </div>

@endsection