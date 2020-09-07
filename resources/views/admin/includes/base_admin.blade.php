@include('admin.includes.header')
@include('admin.includes.navbar')
@include('admin.includes.sidebar')

<div class="content-wrapper px-4">
    @yield('content')
</div>

@include('admin.includes.footer')