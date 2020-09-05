@extends('admin.includes.base_admin')

@section('content')
    <div class="card-body">
        <form action="{{ route('comment.editComment', $comment->id) }}" method="POST">
            @csrf
            <h3>To : {{ $comment->post->title }} - {{ $comment->post->author->name }}</h3>
            <div class="form-group col-sm-4">
                <label for="rate">Comment</label>
                <input value="{{ $comment->comment }}" type="text" class="form-control" id="comment" name="comment">
                @error('comment')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <a href="#" class="btn btn-secondary">Cancel</a>
            <input name="submit" type="submit" value="Edit" class="btn btn-success">
        </form>
    </div>
@endsection