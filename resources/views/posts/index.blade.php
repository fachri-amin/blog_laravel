@extends('layouts.base')

@section('content')
    
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4">Blog Laravel</h1>
        <hr>
        @foreach ($posts as $post)
          <!-- Blog Post -->
          <div class="card mb-4">
            @if ($post->thumbnail)
              <img height=300 width=730 style="object-fit: cover; object-position: center;" src="{{ asset($post->showThumbnail()) }}" alt="">  
            @else
              <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">  
            @endif
            <div class="card-body">
              <h2 class="card-title">{{ $post->title }}</h2>
              <p class="text-muted">{{ $post->category->name }}</p>
              <p class="card-text">{{ Str::limit($post->body, 300) }}</p>
              <a href="post/{{ $post->slug }}" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted {{ $post->created_at->diffForHumans() }} by
              <a>{{ $post->author->name }}</a>
            </div>
          </div>

        @endforeach

        <!-- Pagination -->
        {{-- <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
          </li>
        </ul> --}}
        {{ $posts->links() }}

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
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
    <!-- /.row -->

  </div>
  <!-- /.container -->
@endsection