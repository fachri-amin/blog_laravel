@if (Auth::check() && !Auth::user()->email_verified_at)
    <div class="alert alert-info mb-n1 text-center">
        Your email not verified, please verify your email.
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __(' click here to request another') }}</button>.
        </form>
    </div>
    
@endif


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                @auth
                <li class="nav-item">
                    <a href="{{route('admin')}}" class="nav-link">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Hi, {{ Auth::user()->name }}</a>
                </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>    
                @endauth
            </ul>
        </div>
    </div>
</nav>
@if (session('resent'))
    <div class="alert alert-success text-center" role="alert">
        {{ __('A fresh verification link has been sent to your email address.') }}
    </div>
@endif
