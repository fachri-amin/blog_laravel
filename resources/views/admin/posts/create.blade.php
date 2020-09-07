@extends('admin.includes.base_admin')

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1>Post Add</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">General</h3>

                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/post/save" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="thumbnail">Thumbnail</label>
                            <input class="form-control" type="file" name="thumbnail" id="thumbnail">
                            @error('thumbnail')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Title</label>
                            <input name="title" type="text" class="form-control" id="password">
                            @error('title')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="body">Example textarea</label>
                            <textarea name="body" class="form-control" id="body" rows="3"></textarea>
                            @error('body')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Example select</label>
                            <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button class="btn btn-primary">Add new post</button>
                    </form>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
<!-- /.content -->
@endsection