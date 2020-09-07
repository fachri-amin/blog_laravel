@extends('layouts.base')

@section('content')
    
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4">{{ $post->title }}</h1>

        <!-- Author -->
        <p class="lead">
          by
          <a href="#">{{ $post->author->name }}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>{{ $post->created_at->format('F d, Y') }} - &star; {{ $post->getRatingPost() }}</p>

        <hr>

        <!-- Preview Image -->
        @if ($post->thumbnail)
          <img height=300 width=740 style="object-fit: cover; object-position: center;" src="{{ asset($post->showThumbnail()) }}" alt="">  
        @else
          <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">  
        @endif

        <hr>

        <!-- Post Content -->
        <p class="">{!! nl2br($post->body) !!}</p>

        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            @auth
              <form action="{{ route('comment.saveComment', $post->id) }}" method="POST">
                @csrf
                <div class="form-group">
                  <textarea name="comment" class="form-control" rows="3"></textarea>
                  @error('comment')
                      <div class="text-danger">
                          {{ $message }}
                      </div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            @else
              <div class="form-group mt-n3">
                <label for=""></label>
                  <textarea class="form-control" rows="3" placeholder="You need login to leave comment here."></textarea>
                </div>    
                <button onclick="alert('Login needed')" type="submit" class="btn btn-primary">Submit</button>
            @endauth

          </div>
        </div>

        <!-- Single Comment -->
        @foreach($comments as $comment)
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <div class="justify-content-between">
                <h5 class="mt-0 d-inline-block">{{ $comment->user->name }}</h5>
                @can('update', $post)
                  <div class="d-inline-block float-right">
                    <form action="{{ route('comment.delete', $comment->id) }}" method="POST">
                        @csrf
                        <button onClick="javascript: return confirm('Please confirm deletion');" class="btn btn-danger btn-sm" href="">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </button>
                    </form>
                  </div>
                @endcan
              </div>
              {{ $comment->comment }}
            </div>
          </div>
          <hr>
        @endforeach

        <!-- Comment with nested comments -->
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

        <!-- rating -->
        <div class="card my-4">
          <h5 class="card-header">Rate this post</h5>
          <div class="card-body">
            @can('canRate', $post)
              @auth
                <form action="{{ route('rating.saveRating', $post->id) }}" method="POST">
                  @csrf
                  <div class="form-group">
                    <label for="rate">Rate</label>
                    <input type="number" name="rate" id="rate" class="form-control" placeholder="" min=0 max="10">
                    @error('rate')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <small id="helpId" class="text-muted">Rate from 1 - 10</small>
                  </div>
                  <button type="submit" class="btn btn-primary">Rate</button>
                </form>
              @else
                <div class="form-group">
                  <label for="rate">Rate</label>
                  <input placeholder="you need login to rate this post" type="number" name="rate" id="rate" class="form-control" placeholder="" min=0 max="10">
                  <small id="helpId" class="text-muted">Rate from 1 - 10</small>
                </div>
                <button onclick="alert('Login needed')" type="submit" class="btn btn-primary">Rate</button>
              @endauth
            @else
              <h6>You already rate this post</h6>
            @endcan
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
@endsection