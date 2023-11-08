<div class="wrapper">
 
    <main >
        @include('home/includes.navbar')
        <div >
            @yield('main')
        </div>
    </main>
    @include('home.includes.footer')
  
</div>  
@include('home/includes.js')