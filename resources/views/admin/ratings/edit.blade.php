@extends('admin.includes.base_admin')

@section('content')
    <div class="card-body">
        <form action="{{ route('rating.editRating', $rating->id) }}" method="POST">
            @csrf
            <h3>To : {{ $rating->post->title }} - {{ $rating->post->author->name }}</h3>
            <div class="form-group col-sm-4">
                <label for="rate">Rate</label>
                <input value="{{ $rating->rate }}" type="number" class="form-control" id="rate" name="rate">
                @error('rate')
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