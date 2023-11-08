@extends('home.layout')
@extends('home.includes.header')
@section('title', 'Home')
@section('main')
    <style>
        .post-image {
            max-height: 700px;
            width: 100%;
        }
    </style>
    <section id="content-wrap" class="blog-single">
        <div class="row">
            <div class="col-twelve">

                <article class="format-standard">

                    <div class="content-media">
                        <div class="post-thumb">
                            <img src="{{ asset('images/' . $blog->photo) }} " class='post-image' style='height:30%  !important'>
                        </div>
                    </div>

                    <div class="primary-content">

                        <h1 class="page-title">{{ $blog->title }}</h1>

                        <ul class="entry-meta">
                            <li class="date">{{ $blog->created_at }}</li>
                            <li class="cat"><a>{{ $blog->category }}</a></li>
                        </ul>

                        <p class="lead">{{ $blog->description }}</p>





                        <div class="author-profile">
                            <img src="{{ asset('images/avatars/ThEROCKKK.jpg') }}" alt="">

                            <div class="about">
                                <h4><a href="#">Dwayne Johnson</a></h4>

                                <p>Alias aperiam at debitis deserunt dignissimos dolorem doloribus, fuga fugiat impedit
                                    laudantium magni maxime nihil nisi quidem quisquam sed ullam voluptas voluptatum. Lorem
                                    ipsum dolor sit amet, consectetur adipisicing elit.
                                </p>

                                <ul class="author-social">
                                    <li><a href="#">Facebook</a></li>
                                    <li><a href="#">X</a></li>
                                    <li><a href="#">GOOOGLE</a></li>
                                    <li><a href="#">Instagram</i></a></li>
                                </ul>
                            </div>
                        </div> <!-- end author-profile -->

                    </div> 

                    <div class="pagenav group">
                        <div class="prev-nav">
                            @if ($previousBlogId)
                                <a href="{{ route('showblog', $previousBlogId) }}" rel="prev">
                                    <span>Previous</span>
                                    Previous Blog
                                </a>
                            @endif
                        </div>
                        <div class="next-nav">
                            @if ($nextBlogId)
                                <a href="{{ route('showblog', $nextBlogId) }}" rel="next">
                                    <span>Next</span>
                                    Next Blog
                                </a>
                            @endif
                        </div>
                    </div>

                </article>


            </div>
        </div> <!-- end row -->

        <div class="comments-wrap">
            <div id="comments" class="row">
                <div class="col-full">

                    <h3>5 Comments</h3>

                    <!-- commentlist -->
                    <ol class="commentlist">

                        <li class="depth-1">

                            <div class="avatar">
                                <img width="50" height="50" class="avatar" src="{{ asset('images/avatars/itachi.jpg')}}"
                                    alt="">
                            </div>

                            <div class="comment-content">

                                <div class="comment-info">
                                    <cite>Itachi Uchiha</cite>

                                    <div class="comment-meta">
                                        <time class="comment-time" datetime="2023-07-12T23:05">Jul 12, 2023 @ 23:05</time>
                                        <span class="sep">/</span><a class="reply" href="#">Reply</a>
                                    </div>
                                </div>

                                <div class="comment-text">
                                    <p>Adhuc quaerendum est ne, vis ut harum tantas noluisse, id suas iisque mei. Nec te
                                        inani ponderum vulputate,
                                        facilisi expetenda has et. Iudico dictas scriptorem an vim, ei alia mentitum est, ne
                                        has voluptua praesent.</p>
                                </div>

                            </div>

                        </li>

                        <li class="thread-alt depth-1">

                            <div class="avatar">
                                <img width="50" height="50" class="avatar" src="{{ asset('images/avatars/user-04.jpg')}}"
                                    alt="">
                            </div>

                            <div class="comment-content">

                                <div class="comment-info">
                                    <cite>John Doe</cite>

                                    <div class="comment-meta">
                                        <time class="comment-time" datetime="2014-07-12T24:05">Jul 12, 2014 @ 24:05</time>
                                        <span class="sep">/</span><a class="reply" href="#">Reply</a>
                                    </div>
                                </div>

                                <div class="comment-text">
                                    <p>Sumo euismod dissentiunt ne sit, ad eos iudico qualisque adversarium, tota falli et
                                        mei. Esse euismod
                                        urbanitas ut sed, et duo scaevola pericula splendide. Primis veritus contentiones
                                        nec ad, nec et
                                        tantas semper delicatissimi.</p>
                                </div>

                            </div>

                          

                        </li>

                     
                    </ol> 

                    <!-- respond -->
                    <div class="respond">

                        <h3>Leave a Comment</h3>

                        <form name="contactForm" id="contactForm" method="post" action="">
                            <fieldset>

                                <div class="form-field">
                                    <input name="cName" type="text" id="cName" class="full-width"
                                        placeholder="Your Name" value="">
                                </div>

                                <div class="form-field">
                                    <input name="cEmail" type="text" id="cEmail" class="full-width"
                                        placeholder="Your Email" value="">
                                </div>

                                <div class="form-field">
                                    <input name="cWebsite" type="text" id="cWebsite" class="full-width"
                                        placeholder="Website" value="">
                                </div>

                                <div class="message form-field">
                                    <textarea name="cMessage" id="cMessage" class="full-width" placeholder="Your Message"></textarea>
                                </div>

                                <button type="submit" class="submit button-primary">Submit</button>

                            </fieldset>
                        </form> <!-- Form End -->

                    </div> <!-- Respond End -->

                </div> <!-- end col-full -->
            </div> <!-- end row comments -->
        </div> <!-- end comments-wrap -->

    </section> <!-- end content -->



@endsection
