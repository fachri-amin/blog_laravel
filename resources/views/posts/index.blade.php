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
                            <p class="text-muted">{{ $post->category->name }}</p>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <p>{{ Str::limit($post->body, 300) }}</p>
                            </div>
                            <a href="post/{{ $post->slug }}">Read more</a>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <p class="text-muted">Published on {{ $post->created_at->diffForHumans() }}</p>
                            <div>
                                <a href="/post/edit/{{ $post->slug }}" class="btn btn-warning">Edit</a>
                                <form class="d-inline" action="/post/delete/{{ $post->slug }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" onclick="return confirm('Ingin mengapus postingan ini?')" href="" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $posts->links() }}
            </div>
            <div class="col-md-4">
                <a href="/post/create" class="btn btn-primary">New post</a>
            </div>
        </div>
    </div>

@endsection