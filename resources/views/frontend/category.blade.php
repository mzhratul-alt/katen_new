@extends('layouts.frontend_master')
@section('main')
<!-- section main content -->
<section class="main-content">
    <div class="container-xl">

        <div class="row gy-4">

            <div class="col-lg-8">

                <div class="row gy-4">
                    @forelse ( $posts as $post )
                    <div class="col-sm-6">
                        <!-- post -->
                        <div class="post post-grid rounded bordered h-100">
                            <div class="thumb top-rounded">
                                <a href=""
                                    class="category-badge position-absolute">{{ $post->category->name }}</a>
                                <span class="post-format">
                                    <i class="icon-picture"></i>
                                </span>
                                <a href="{{ route('showPost',$post->slug ) }}">
                                    <div class="inner">
                                        <img src="{{ asset('storage/posts/'.$post->featured_image) }}" alt="post-title" style="width: 100%; height: 200px; object-fit: cover; object-position: center;"/>
                                    </div>
                                </a>
                            </div>
                            <div class="details">
                                <ul class="meta list-inline mb-0">
                                    <li class="list-inline-item"><a href="category.html#"><img
                                                src="{{ asset('storage/users/'.$post->user->profile) }}" class="author img-fluid rounded-circle" style="width: 30px; height: 30px;object-fit: cover; object-position: center;" alt="author" />{{ $post->user->name }}</a></li>
                                    <li class="list-inline-item">{{ \Carbon\Carbon::parse($post->created_at)->format('M d, Y') }}</li>
                                </ul>
                                <h5 class="post-title mb-3 mt-3"><a href="{{ route('showPost',$post->slug ) }}">{{ $post->title }}</a></h5>
                                <p class="excerpt mb-0">{{ $post->short_description }}</p>
                            </div>
                            <div class="post-bottom clearfix d-flex align-items-center">
                                <div class="social-share me-auto">
                                    <button class="toggle-button icon-share"></button>
                                    <ul class="icons list-unstyled list-inline mb-0">
                                        <li class="list-inline-item"><a href="category.html#"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                        <li class="list-inline-item"><a href="category.html#"><i
                                                    class="fab fa-twitter"></i></a></li>
                                        <li class="list-inline-item"><a href="category.html#"><i
                                                    class="fab fa-linkedin-in"></i></a></li>
                                        <li class="list-inline-item"><a href="category.html#"><i
                                                    class="fab fa-pinterest"></i></a></li>
                                        <li class="list-inline-item"><a href="category.html#"><i
                                                    class="fab fa-telegram-plane"></i></a></li>
                                        <li class="list-inline-item"><a href="category.html#"><i
                                                    class="far fa-envelope"></i></a></li>
                                    </ul>
                                </div>
                                <div class="more-button float-end">
                                    <a href="blog-single.html"><span class="icon-options"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="alert alert-danger rounded">
                        No Post Found!
                    </div>
                    @endforelse
                </div>

                {{ $posts->links() }}

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
                                <li class="list-inline-item"><a href="category.html#"><i
                                            class="fab fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a href="category.html#"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li class="list-inline-item"><a href="category.html#"><i
                                            class="fab fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="category.html#"><i
                                            class="fab fa-pinterest"></i></a></li>
                                <li class="list-inline-item"><a href="category.html#"><i class="fab fa-medium"></i></a>
                                </li>
                                <li class="list-inline-item"><a href="category.html#"><i class="fab fa-youtube"></i></a>
                                </li>
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
                                <li><a href="category.html#">Lifestyle</a><span>(5)</span></li>
                                <li><a href="category.html#">Inspiration</a><span>(2)</span></li>
                                <li><a href="category.html#">Fashion</a><span>(4)</span></li>
                                <li><a href="category.html#">Politic</a><span>(1)</span></li>
                                <li><a href="category.html#">Trending</a><span>(7)</span></li>
                                <li><a href="category.html#">Culture</a><span>(3)</span></li>
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
                                    href="category.html#">Privacy Policy</a></span>
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
                                        <li class="list-inline-item"><a href="category.html#">Katen Doe</a></li>
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
                                        <li class="list-inline-item"><a href="category.html#">Katen Doe</a></li>
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
                                        <li class="list-inline-item"><a href="category.html#">Katen Doe</a></li>
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
                        <a href="category.html#" class="widget-ads">
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
                            <a href="category.html#" class="tag">#Trending</a>
                            <a href="category.html#" class="tag">#Video</a>
                            <a href="category.html#" class="tag">#Featured</a>
                            <a href="category.html#" class="tag">#Gallery</a>
                            <a href="category.html#" class="tag">#Celebrities</a>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
</section>
@endsection
