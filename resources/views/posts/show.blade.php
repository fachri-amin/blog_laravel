@extends('layouts.base')

@section('content')
    <div class="container text-center">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
    </div>
@endsection