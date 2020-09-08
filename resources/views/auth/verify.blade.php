@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card rounded shadow-lg">
                <div class="card-header text-center">
                    <h4 class="my-5">Before proceeding, please check your email for a verification link.</h4>
                </div>
                <div class="card-body">
                    <form class="text-center" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-lg btn-primary">{{ __('click here to request another') }}</button>
                    </form>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
