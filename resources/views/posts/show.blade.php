@extends('layouts.base')

@section('content')
    <div class="container">
    <h1>{{ $post->title }}</h1>
    <hr>
    <p>{!! nl2br($post->body) !!}</p>
    </div>
@endsection