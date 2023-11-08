@extends('home.layout')
@extends('home.includes.header')
@section('title', 'Home')
@section('main')
    <section id="bricks">
        @if (session('Auth'))
            <div class="alert">
                {{ session('Auth') }}
            </div>
        @endif

        <div class="row masonry">

            <!-- brick-wrapper -->
            <div class="bricks-wrapper">

                <div class="grid-sizer"></div>

                @foreach ($blogs as $blog)
                    <article class="brick entry format-standard animate-this">

                        <div class="entry-thumb">
                            <a href="{{ route('showblog', $blog->id) }}" class="thumb-link">
                                <img src="{{ asset('images/' . $blog->photo) }}">
                            </a>
                        </div>

                        <div class="entry-text">
                            <div class="entry-header">

                                <div class="entry-meta">
                                    <span class="cat-links">
                                        <a href="{{ route('showblog', $blog->id) }}">{{ $blog->category }}</a>

                                    </span>
                                </div>

                                <h1 class="entry-title"><a href="{{ route('showblog', $blog->id) }}">{{ $blog->title }}</a>
                                </h1>

                            </div>
                            <div class="entry-excerpt">
                                {{ substr($blog->description, 0, 150) }}
                                @if (strlen($blog->description) > 150)
                                    <a href="{{ route('showblog', $blog->id) }}">Read more</a>
                                @endif
                            </div>
                        </div>

                    </article> <!-- end article -->
                @endforeach





            </div> <!-- end brick-wrapper -->

        </div> <!-- end row -->

        <div class="row">

            <nav class="pagination">
                <span class="page-numbers prev inactive">Prev</span>
                <span class="page-numbers current">1</span>
                <a href="#" class="page-numbers">2</a>
                <a href="#" class="page-numbers">3</a>
                <a href="#" class="page-numbers">4</a>
                <a href="#" class="page-numbers">5</a>
                <a href="#" class="page-numbers">6</a>
                <a href="#" class="page-numbers">7</a>
                <a href="#" class="page-numbers">8</a>
                <a href="#" class="page-numbers">9</a>
                <a href="#" class="page-numbers next">Next</a>
            </nav>

        </div>

    </section>


    <div id="preloader">
        <div id="loader"></div>
    </div>

@endsection
