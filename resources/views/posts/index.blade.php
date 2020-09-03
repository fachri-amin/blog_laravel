@extends('layouts.base')

@section('content')
    <div class="container"  >
        <h1 class="mb-4">All Post</h1>
        <hr>
        <div class="row">
            <div class="col-md-8">
                @foreach ($posts as $post)
                    <div class="card mb-5">
                        <div class="card-header">
                            <h3>{{ $post->title }}</h3>
                            <p class="text-muted d-inline"> By: {{ $post->author->name }}</p> &minus; <a href="/category/{{ $post->category->slug }}" class="text-muted d-inline">{{ $post->category->name }}</a>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <p>{{ Str::limit($post->body, 300) }}</p>
                            </div>
                            <a href="post/{{ $post->slug }}">Read more</a>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <p class="text-muted">Published on {{ $post->created_at->diffForHumans() }}</p>
                            @auth
                                <div>
                                    <a href="/post/edit/{{ $post->slug }}" class="btn btn-warning">Edit</a>
                                    <form class="d-inline" action="/post/delete/{{ $post->slug }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="return confirm('Ingin mengapus postingan ini?')" href="" class="btn btn-danger">Delete</button>
                                    </form>    
                                </div>
                            @endauth
                        </div>
                    </div>
                @endforeach
                {{ $posts->links() }}
            </div>
            <div class="col-md-4">
                @auth
                    <a href="/post/create" class="btn btn-primary">New post</a>
                @endauth
                <div class="list-group mt-3">
                    <h4 class="my-2">Categories:</h4>
                    @isset($category)
                        @foreach ($all_category as $category_link)
                            <a href="/category/{{ $category_link->slug }}" class="list-group-item list-group-item-action{{ $category_link->name == $category->name ? ' active' : '' }}">
                                {{ $category_link->name }}
                            </a>
                        @endforeach
                    @else
                        @foreach ($all_category as $category_link)
                            <a href="/category/{{ $category_link->slug }}" class="list-group-item list-group-item-action">
                                {{ $category_link->name }}
                            </a>
                        @endforeach                        
                    @endisset
                </div>
            </div>
        </div>
    </div>

@endsection