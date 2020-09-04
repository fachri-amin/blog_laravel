@include('admin.includes.header')
@include('admin.includes.navbar')
@include('admin.includes.sidebar')

<div class="content-wrapper">
    @yield('content')
</div>

@include('admin.includes.footer')