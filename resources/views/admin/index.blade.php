@extends('admin.includes.base_admin')

@section('content')

<div class="row">
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
            <h3>{{ $all_users }}</h3>

            <p>User registered</p>
            </div>
            <div class="icon">
            <i class="ion ion-bag"></i>
            </div>
            {{-- <a href="<?= BASE_URL_ADMIN ?>pages/users/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3>{{ $all_posts }}</h3>

            <p>Post Created</p>
            </div>
            <div class="icon">
            <i class="ion ion-bag"></i>
            </div>
            {{-- <a href="<?= BASE_URL_ADMIN ?>pages/users/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
        </div>
    </div>
        <!-- ./col -->
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
            <h3>{{ $all_categories }}</h3>

            <p>Categories available</p>
            </div>
            <div class="icon">
            <i class="ion ion-stats-bars"></i>
            </div>
            {{-- <a href="<?= BASE_URL_ADMIN ?>pages/posts/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
        </div>
    </div>
        <!-- ./col -->
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
            <h3>{{ $all_comments }}</h3>

            <p>Comments given</p>
            </div>
            <div class="icon">
            <i class="ion ion-person-add"></i>
            </div>
            {{-- <a href="<?= BASE_URL_ADMIN ?>pages/categories/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
        </div>
    </div>
    
@endsection