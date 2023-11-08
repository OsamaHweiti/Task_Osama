


<div class="wrapper">
    @include('admin/include.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('admin/include.navbar')
        <div class="container-fluid py-4">
            @yield('main')
        </div>
    </main>
    @include('admin/include.js')
</div>