@extends('layouts.frontend_master')
@section('main')

<!-- section main content -->
<section class="main-content mt-3">
    <div class="container-xl">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="blog-single.html#">Home</a></li>
                <li class="breadcrumb-item"><a href="blog-single.html#">Inspiration</a></li>
                <li class="breadcrumb-item active" aria-current="page">3 Easy Ways To Make Your iPhone Faster</li>
            </ol>
        </nav>

        <div class="row gy-4">

            <div class="col-lg-8">
                <!-- post single -->
                <div class="post post-single">
                    <!-- post header -->
                    <div class="post-header">
                        <h1 class="title mt-0 mb-3">{{ $post->title }}</h1>
                        <ul class="meta list-inline mb-0">
                            <li class="list-inline-item"><a href="blog-single.html#"><img
                                        src="images/other/author-sm.png" class="author" alt="author" />Katen Doe</a>
                            </li>
                            <li class="list-inline-item"><a href="blog-single.html#">Trending</a></li>
                            <li class="list-inline-item">29 March 2021</li>
                        </ul>
                    </div>
                    <!-- featured image -->
                    <div class="featured-image">
                        <img src="{{ asset('storage/posts/'.$post->featured_image) }}" alt="post-title"
                            style="width: 100%" />
                    </div>
                    <!-- post content -->
                    <div class="post-content clearfix">{!!$post->description!!}</div>
                    <!-- post bottom section -->
                    <div class="post-bottom">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-6 col-12 text-center text-md-start">
                                <!-- tags -->
                                <a href="blog-single.html#" class="tag">#Trending</a>
                                <a href="blog-single.html#" class="tag">#Video</a>
                                <a href="blog-single.html#" class="tag">#Featured</a>
                            </div>
                            <div class="col-md-6 col-12">
                                <!-- social icons -->
                                <ul class="social-icons list-unstyled list-inline mb-0 float-md-end">
                                    <li class="list-inline-item"><a href="blog-single.html#"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                    <li class="list-inline-item"><a href="blog-single.html#"><i
                                                class="fab fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a href="blog-single.html#"><i
                                                class="fab fa-linkedin-in"></i></a></li>
                                    <li class="list-inline-item"><a href="blog-single.html#"><i
                                                class="fab fa-pinterest"></i></a></li>
                                    <li class="list-inline-item"><a href="blog-single.html#"><i
                                                class="fab fa-telegram-plane"></i></a></li>
                                    <li class="list-inline-item"><a href="blog-single.html#"><i
                                                class="far fa-envelope"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="spacer" data-height="50"></div>

                <div class="about-author padding-30 rounded">
                    <div class="thumb">
                        <img src="images/other/avatar-about.png" alt="Katen Doe" />
                    </div>
                    <div class="details">
                        <h4 class="name"><a href="blog-single.html#">Katen Doe</a></h4>
                        <p>Hello, I’m a content writer who is fascinated by content fashion, celebrity and lifestyle.
                            She helps clients bring the right content to the right people.</p>
                        <!-- social icons -->
                        <ul class="social-icons list-unstyled list-inline mb-0">
                            <li class="list-inline-item"><a href="blog-single.html#"><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="blog-single.html#"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li class="list-inline-item"><a href="blog-single.html#"><i
                                        class="fab fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="blog-single.html#"><i
                                        class="fab fa-pinterest"></i></a></li>
                            <li class="list-inline-item"><a href="blog-single.html#"><i class="fab fa-medium"></i></a>
                            </li>
                            <li class="list-inline-item"><a href="blog-single.html#"><i class="fab fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="spacer" data-height="50"></div>

                <!-- section header -->
                <div class="section-header">
                    <h3 class="section-title">Comments ({{ $post->comments->count() }})</h3>
                    <img src="{{ asset('frontend/images/wave.svg') }}" class="wave" alt="wave" />
                </div>
                <!-- post comments -->
                <div class="comments bordered padding-30 rounded">

                    <ul class="comments">
                        @foreach ($post->comments as $comment)
                        <!-- comment item -->
                        <li class="comment rounded">
                            <div class="thumb">
                                <img style="width: 50px"
                                    src="{{ $comment->user->profile ? asset('storage/users/'.$comment->user->profile) : env('DUMMY_IMG'). $comment->user->name}}"
                                    alt="{{ $comment->user->name }}" />
                            </div>
                            <div class="details">
                                <h4 class="name"><a href="blog-single.html#">{{ $comment->user->name }}</a></h4>
                                <span
                                    class="date">{{ \Carbon\Carbon::parse($comment->created_at)->format('M d, Y h:i:s A') }}</span>
                                <p>{{ $comment->content }}</p>
                                <a class="reply_btn" href="#comment_form" data-parent-id="{{ $comment->id }}"
                                    class="btn btn-default btn-sm">Reply</a>
                            </div>
                        </li>
                        @if ($comment->replies->count() > 0)
                        @foreach ($comment->replies as $reply)
                        <li class="comment rounded child">
                            <div class="thumb">
                                <img style="width: 50px"
                                    src="{{ $reply->user->profile ? asset('storage/users/'.$reply->user->profile) : env('DUMMY_IMG'). $reply->user->name}}"
                                    alt="{{ $reply->user->name }}" />
                            </div>
                            <div class="details">
                                <h4 class="name"><a href="blog-single.html#">{{ $reply->user->name }}</a></h4>
                                <span
                                    class="date">{{ \Carbon\Carbon::parse($reply->created_at)->format('M d, Y h:i:s A') }}</span>
                                <p>{{ $reply->content }}</p>
                                <a class="reply_btn" href="#comment_form" data-parent-id="{{ $reply->id }}"
                                    class="btn btn-default btn-sm">Reply</a>
                            </div>
                        </li>
                        @include('utility.reply')
                        @endforeach
                        @endif
                        @endforeach
                    </ul>
                </div>

                <div class="spacer" data-height="50"></div>

                <!-- section header -->
                <div class="section-header">
                    <h3 class="section-title">Leave Comment</h3>
                    <img src="{{ asset('frontend/images/wave.svg') }}" class="wave" alt="wave" />
                </div>
                @auth
                <!-- comment form -->
                <div id="comment_form" class="comment-form rounded bordered padding-30">

                    <form id="comment-form" class="comment-form" method="post" action="{{ route('comment.store') }}">
                        @csrf
                        <div class="messages"></div>

                        <div class="row">
                            <input type="hidden" name="post" value="{{ $post->id }}">
                            <input id="parent_id" type="hidden" name="parent" value="">
                            <div class="column col-md-12">
                                <!-- Comment textarea -->
                                <div class="form-group">
                                    <textarea name="content" id="InputComment" class="form-control" rows="4"
                                        placeholder="Your comment here..." required="required"></textarea>
                                </div>
                            </div>

                        </div>

                        <button type="submit" id="submit" value="Submit" class="btn btn-default">Submit</button>
                        <!-- Submit Button -->

                    </form>
                </div>
                @endauth
                @guest
                <div class="alert rounded alert-danger">Please Login to post a comment!</div>
                @endguest

            </div>

            <div class="col-lg-4">

                <!-- sidebar -->
                <div class="sidebar">
                    <!-- widget about -->
                    <div class="widget rounded">
                        <div class="widget-about data-bg-image text-center" data-bg-image="images/map-bg.png">
                            <img src="images/logo.svg" alt="logo" class="mb-4" />
                            <p class="mb-4">Hello, We’re content writer who is fascinated by content fashion, celebrity
                                and lifestyle. We helps clients bring the right content to the right people.</p>
                            <ul class="social-icons list-unstyled list-inline mb-0">
                                <li class="list-inline-item"><a href="blog-single.html#"><i
                                            class="fab fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a href="blog-single.html#"><i
                                            class="fab fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="blog-single.html#"><i
                                            class="fab fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="blog-single.html#"><i
                                            class="fab fa-pinterest"></i></a></li>
                                <li class="list-inline-item"><a href="blog-single.html#"><i
                                            class="fab fa-medium"></i></a></li>
                                <li class="list-inline-item"><a href="blog-single.html#"><i
                                            class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- widget popular posts -->
                    <div class="widget rounded">
                        <div class="widget-header text-center">
                            <h3 class="widget-title">Popular Posts</h3>
                            <img src="images/wave.svg" class="wave" alt="wave" />
                        </div>
                        <div class="widget-content">
                            <!-- post -->
                            <div class="post post-list-sm circle">
                                <div class="thumb circle">
                                    <span class="number">1</span>
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="images/posts/tabs-1.jpg" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details clearfix">
                                    <h6 class="post-title my-0"><a href="blog-single.html">3 Easy Ways To Make Your
                                            iPhone Faster</a></h6>
                                    <ul class="meta list-inline mt-1 mb-0">
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- post -->
                            <div class="post post-list-sm circle">
                                <div class="thumb circle">
                                    <span class="number">2</span>
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="images/posts/tabs-2.jpg" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details clearfix">
                                    <h6 class="post-title my-0"><a href="blog-single.html">An Incredibly Easy Method
                                            That Works For All</a></h6>
                                    <ul class="meta list-inline mt-1 mb-0">
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- post -->
                            <div class="post post-list-sm circle">
                                <div class="thumb circle">
                                    <span class="number">3</span>
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="images/posts/tabs-3.jpg" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details clearfix">
                                    <h6 class="post-title my-0"><a href="blog-single.html">10 Ways To Immediately Start
                                            Selling Furniture</a></h6>
                                    <ul class="meta list-inline mt-1 mb-0">
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- widget categories -->
                    <div class="widget rounded">
                        <div class="widget-header text-center">
                            <h3 class="widget-title">Explore Topics</h3>
                            <img src="images/wave.svg" class="wave" alt="wave" />
                        </div>
                        <div class="widget-content">
                            <ul class="list">
                                @foreach ($categories as $category)
                                <li><a href="{{ route('category', $category->slug) }}">{{ $category->name }}</a><span>({{
                                        $category->posts_count }})</span></li>
                                @endforeach
                            </ul>
                        </div>

                    </div>

                    <!-- widget newsletter -->
                    <div class="widget rounded">
                        <div class="widget-header text-center">
                            <h3 class="widget-title">Newsletter</h3>
                            <img src="images/wave.svg" class="wave" alt="wave" />
                        </div>
                        <div class="widget-content">
                            <span class="newsletter-headline text-center mb-3">Join 70,000 subscribers!</span>
                            <form>
                                <div class="mb-2">
                                    <input class="form-control w-100 text-center" placeholder="Email address…"
                                        type="email">
                                </div>
                                <button class="btn btn-default btn-full" type="submit">Sign Up</button>
                            </form>
                            <span class="newsletter-privacy text-center mt-3">By signing up, you agree to our <a
                                    href="blog-single.html#">Privacy Policy</a></span>
                        </div>
                    </div>

                    <!-- widget post carousel -->
                    <div class="widget rounded">
                        <div class="widget-header text-center">
                            <h3 class="widget-title">Celebration</h3>
                            <img src="images/wave.svg" class="wave" alt="wave" />
                        </div>
                        <div class="widget-content">
                            <div class="post-carousel-widget">
                                <!-- post -->
                                <div class="post post-carousel">
                                    <div class="thumb rounded">
                                        <a href="category.html" class="category-badge position-absolute">How to</a>
                                        <a href="blog-single.html">
                                            <div class="inner">
                                                <img src="images/widgets/widget-carousel-1.jpg" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <h5 class="post-title mb-0 mt-4"><a href="blog-single.html">5 Easy Ways You Can Turn
                                            Future Into Success</a></h5>
                                    <ul class="meta list-inline mt-2 mb-0">
                                        <li class="list-inline-item"><a href="blog-single.html#">Katen Doe</a></li>
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                </div>
                                <!-- post -->
                                <div class="post post-carousel">
                                    <div class="thumb rounded">
                                        <a href="category.html" class="category-badge position-absolute">Trending</a>
                                        <a href="blog-single.html">
                                            <div class="inner">
                                                <img src="images/widgets/widget-carousel-2.jpg" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <h5 class="post-title mb-0 mt-4"><a href="blog-single.html">Master The Art Of Nature
                                            With These 7 Tips</a></h5>
                                    <ul class="meta list-inline mt-2 mb-0">
                                        <li class="list-inline-item"><a href="blog-single.html#">Katen Doe</a></li>
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                </div>
                                <!-- post -->
                                <div class="post post-carousel">
                                    <div class="thumb rounded">
                                        <a href="category.html" class="category-badge position-absolute">How to</a>
                                        <a href="blog-single.html">
                                            <div class="inner">
                                                <img src="images/widgets/widget-carousel-1.jpg" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <h5 class="post-title mb-0 mt-4"><a href="blog-single.html">5 Easy Ways You Can Turn
                                            Future Into Success</a></h5>
                                    <ul class="meta list-inline mt-2 mb-0">
                                        <li class="list-inline-item"><a href="blog-single.html#">Katen Doe</a></li>
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- carousel arrows -->
                            <div class="slick-arrows-bot">
                                <button type="button" data-role="none" class="carousel-botNav-prev slick-custom-buttons"
                                    aria-label="Previous"><i class="icon-arrow-left"></i></button>
                                <button type="button" data-role="none" class="carousel-botNav-next slick-custom-buttons"
                                    aria-label="Next"><i class="icon-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>

                    <!-- widget advertisement -->
                    <div class="widget no-container rounded text-md-center">
                        <span class="ads-title">- Sponsored Ad -</span>
                        <a href="blog-single.html#" class="widget-ads">
                            <img src="images/ads/ad-360.png" alt="Advertisement" />
                        </a>
                    </div>

                    <!-- widget tags -->
                    <div class="widget rounded">
                        <div class="widget-header text-center">
                            <h3 class="widget-title">Tag Clouds</h3>
                            <img src="images/wave.svg" class="wave" alt="wave" />
                        </div>
                        <div class="widget-content">
                            <a href="blog-single.html#" class="tag">#Trending</a>
                            <a href="blog-single.html#" class="tag">#Video</a>
                            <a href="blog-single.html#" class="tag">#Featured</a>
                            <a href="blog-single.html#" class="tag">#Gallery</a>
                            <a href="blog-single.html#" class="tag">#Celebrities</a>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
</section>
@endsection
@push('additional_js')
<script>
    $('.reply_btn').on('click', function(){
        $('#parent_id').val($(this).data('parent-id'));
    })
</script>
@endpush
