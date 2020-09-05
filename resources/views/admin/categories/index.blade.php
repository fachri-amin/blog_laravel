@extends('admin.includes.base_admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Category Management</h1>
        </div>
        <div class="col-sm-6">
        <form class="form-inline float-right" action="" method="get">
            <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search here" aria-label="Search">
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
                            id
                        </th>
                        <th style="width: 20%">
                            Name
                        </th>
                        <th style="width: 20%">
                        Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            {{ $category->id }}
                        </td>
                        <td>
                            <a>
                                {{ $category->name }}
                            </a>
                            <br/>
                            <small>
                                {{ $category->created_at }}
                            </small>
                        </td>
                        <td class="project-actions text-left">
                            <a class="btn btn-info btn-sm d-inline-block" href="{{ route('category.edit', $category->slug) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <div class="d-inline-block">
                                <form action="{{ route('category.delete', $category->slug) }}" method="POST">
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
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <a href="{{ route('category.create') }}" class="btn btn-primary">New Category</a>
</section>
@endsection