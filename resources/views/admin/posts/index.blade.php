@extends('admin.includes.base_admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Post Management</h1>
        </div>
        <div class="col-sm-6">
        <form class="form-inline float-right" action="{{ route('post.searchAdmin') }}" method="get">
            <input name="query" class="form-control mr-sm-2" type="search" placeholder="Search here" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        </div>
    </div>
    </div><!-- /.container-fluid -->
    <!-- SEARCH FORM -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Users</h3>

            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            Id
                        </th>
                        <th style="width: 20%">
                            Title
                        </th>
                        <th style="width: 20%">
                            Written by
                        </th>
                        <th style="width: 10%">
                            Rating
                        </th>
                        <th style="width: 10%">
                            Category
                        </th>
                        <th style="width: 20%">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    @can('update', $post)
                        <tr>
                            <td>
                                {{ $post->id }}
                            </td>
                            <td>
                                <a href="{{ route('post.detail', $post->slug) }}">
                                    {{ $post->title }}
                                </a>
                                <br/>
                                <small>
                                    {{ $post->created_at }}
                                </small>
                            </td>
                            <td>
                                {{ $post->author->username }}
                            </td>
                            <td>
                                {{ $post->getRatingPost() }}
                            </td>
                            <td>
                                {{ $post->category->name }}
                            </td>
                            <td class="project-actions text-left">
                            <a class="btn btn-info btn-sm d-inline-block" href="{{ route('post.edit', $post->slug) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <div class="d-inline-block">
                                    <form action="{{ route('post.delete', $post->slug) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button onClick="javascript: return confirm('Please confirm deletion');" class="btn btn-danger btn-sm" href="">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endcan
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <div class="justify-content-between row">
        <a class="btn btn-primary d-inline-block" href="{{ route('post.create') }}">New Post</a>
        <div class="d-inline-block">
            {{ $posts->links() }}
        </div>
    </div>
</section>
@endsection