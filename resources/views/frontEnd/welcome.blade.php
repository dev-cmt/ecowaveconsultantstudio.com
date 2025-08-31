<x-frontend-layout>
@section('title', 'Home')
@section('breadcrumb')
    <!-- Bnner Section -->
    <section class="banner-section">
        <div class="banner-carousel owl-carousel owl-theme">
            <div class="slide-item" style="background-image: url({{asset('frontEnd')}}/images/sliders/slider-1.jpg);">
                <div class="auto-container">
                    <div class="content-box">
                        <h2>Architecture is a <br> Visual Art.</h2>
                        <div class="text">The buildings speak for themselves</div>
                        <div class="link-box">
                            <a href="about.html" class="theme-btn btn-style-one">Check Art</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-item" style="background-image: url({{asset('frontEnd')}}/images/sliders/slider-2.jpg);">
                <div class="auto-container">
                    <div class="content-box">
                        <h2>Architecture is a <br> Visual Art.</h2>
                        <div class="text">The buildings speak for themselves</div>
                        <div class="link-box">
                            <a href="about.html" class="theme-btn btn-style-one">Check Art</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bottom-box">
            <div class="auto-container clearfix">
                <ul class="contact-info">
                    <li><span>Phone :</span> <a href="tel:+8801715668144">+880-1715-668-144</a></li>
                    <li><span>EMAIL :</span> <a href="mailto:ecowave.bd@gmail.com">ecowave.bd@gmail.com</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Bnner Section -->
@endsection
@section('content')
    <!-- About Section -->
    <section class="about-section" style="background-image: url({{asset('frontEnd')}}/images/pages/bg-about-us.jpg);">
        <div class="auto-container">
            <div class="row no-gutters">
                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="title-box wow fadeInLeft" data-wow-delay='1200ms'>
                            <h2>ABOUT <br> US</h2>
                        </div>
                        <div class="image-box">
                            <figure class="alphabet-img wow fadeInRight"><img src="{{asset('frontEnd')}}/images/pages/about-us-1.png" alt=""></figure>
                            <figure class="image wow fadeInRight" data-wow-delay='600ms'><img src="{{asset('frontEnd')}}/images/pages/about-us-2.jpg" alt=""></figure>
                        </div>
                    </div>
                </div>

                <!-- Content Column -->
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column wow fadeInLeft">
                        <div class="content-box">
                            <div class="title">
                                <h2>Ecowave Consultant <br> Studio</h2>
                            </div>
                            <div class="text">At Ecowave Consultant Studio, we transform ordinary spaces into extraordinary environments. With over 14 years of experience in creating inspired interiors, our expert team specializes in delivering innovative, sustainable, and aesthetically pleasing designs. Whether you are a homeowner, office owner, architect, or property developer, our tailored solutions bring your vision to life for users and the surrounding community.</div>
                            <div class="link-box"><a href="about.html" class="theme-btn btn-style-one">About Us</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End About Section -->

    <!-- Services Section -->
    <section class="services-section">
        <div class="upper-box" style="background-image: url({{asset('frontEnd')}}/images/pages/bg-service.jpg);">
            <div class="auto-container">    
                <div class="sec-title text-center light">
                    <span class="float-text">Specialization</span>
                    <h2>Our Specialization</h2>
                </div>
            </div>
        </div>

        <div class="services-box">
            <div class="auto-container">
                <div class="services-carousel owl-carousel owl-theme">
                    @foreach($services as $service)
                    <!-- Service Block -->
                    <div class="service-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image">
                                    <a href="{{ route('page.services-details', $service->slug) }}">
                                        <img src="{{ asset($service->image) }}" alt="{{ $service->title }}">
                                    </a>
                                </figure>
                            </div>
                            <div class="lower-content">
                                <h3>
                                    <a href="{{ route('page.services-details', $service->slug) }}">
                                        {{ $service->title }}
                                    </a>
                                </h3>
                                <div class="text">{{ $service->description }}</div>
                                <div class="link-box">
                                    <a href="{{ route('page.services-details', $service->slug) }}">
                                        Learn More <i class="fa fa-long-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--End Services Section -->

    <!-- Fun Fact Section -->
    <section class="fun-fact-section">
        <div class="outer-box" style="background-image: url(images/background/3.jpg);">
            <div class="auto-container">
                <div class="fact-counter">
                    <div class="row">
                        <!--Column-->
                        <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp">
                            <div class="count-box">
                                <div class="count"><span class="count-text" data-speed="5000" data-stop="14">0</span></div>
                                <h4 class="counter-title">Years of <br>Experience</h4>
                            </div>
                        </div>

                        <!--Column-->
                        <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                            <div class="count-box">
                                <div class="count"><span class="count-text" data-speed="5000" data-stop="237">0</span></div>
                                <h4 class="counter-title">Project <br>Taken</h4>
                            </div>
                        </div>

                        <!--Column-->
                        <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="800ms">
                            <div class="count-box">
                                <div class="count"><span class="count-text" data-speed="5000" data-stop="11">0</span>K</div>
                                <h4 class="counter-title">Twitter <br> Follower</h4>
                            </div>
                        </div>

                        <!--Column-->
                        <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="1200ms">
                            <div class="count-box">
                                <div class="count"><span class="count-text" data-speed="5000" data-stop="12">0</span></div>
                                <h4 class="counter-title">Awards<br>won</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Fun Fact Section -->

    <!-- Project Section -->
    <section class="projects-section">
        <div class="auto-container">
            <div class="sec-title text-right">
                <span class="float-text">Project</span>
                <h2>Our Project</h2>
            </div>
        </div>
        
        <div class="inner-container">
            <div class="projects-carousel owl-carousel owl-theme">
                <!-- Project Block -->
                <div class="project-block">
                    <div class="image-box">
                        <figure class="image"><img src="images/gallery/1.jpg" alt=""></figure>
                        <div class="overlay-box">
                            <h4><a href="project-detail.html">Laxury Home <br>Project</a></h4>
                            <div class="btn-box">
                                <a href="images/gallery/1.jpg" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>
                                <a href="project-detail.html"><i class="fa fa-external-link"></i></a>
                            </div>
                            <span class="tag">Architecture</span>
                        </div>
                    </div>
                </div>

                <!-- Project Block -->
                <div class="project-block">
                    <div class="image-box">
                        <figure class="image"><img src="images/gallery/2.jpg" alt=""></figure>
                        <div class="overlay-box">
                            <h4><a href="project-detail.html">Laxury Home <br>Project</a></h4>
                            <div class="btn-box">
                                <a href="images/gallery/2.jpg" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>
                                <a href="project-detail.html"><i class="fa fa-external-link"></i></a>
                            </div>
                            <span class="tag">Architecture</span>
                        </div>
                    </div>
                </div>

                <!-- Project Block -->
                <div class="project-block">
                    <div class="image-box">
                        <figure class="image"><img src="images/gallery/3.jpg" alt=""></figure>
                        <div class="overlay-box">
                            <h4><a href="project-detail.html">Laxury Home <br>Project</a></h4>
                            <div class="btn-box">
                                <a href="images/gallery/3.jpg" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>
                                <a href="project-detail.html"><i class="fa fa-external-link"></i></a>
                            </div>
                            <span class="tag">Architecture</span>
                        </div>
                    </div>
                </div>

                <!-- Project Block -->
                <div class="project-block">
                    <div class="image-box">
                        <figure class="image"><img src="images/gallery/4.jpg" alt=""></figure>
                        <div class="overlay-box">
                            <h4><a href="project-detail.html">Laxury Home <br>Project</a></h4>
                            <div class="btn-box">
                                <a href="images/gallery/4.jpg" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>
                                <a href="project-detail.html"><i class="fa fa-external-link"></i></a>
                            </div>
                            <span class="tag">Architecture</span>
                        </div>
                    </div>
                </div>

                <!-- Project Block -->
                <div class="project-block">
                    <div class="image-box">
                        <figure class="image"><img src="images/gallery/5.jpg" alt=""></figure>
                        <div class="overlay-box">
                            <h4><a href="project-detail.html">Laxury Home <br>Project</a></h4>
                            <div class="btn-box">
                                <a href="images/gallery/5.jpg" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>
                                <a href="project-detail.html"><i class="fa fa-external-link"></i></a>
                            </div>
                            <span class="tag">Architecture</span>
                        </div>
                    </div>
                </div>

                <!-- Project Block -->
                <div class="project-block">
                    <div class="image-box">
                        <figure class="image"><img src="images/gallery/3.jpg" alt=""></figure>
                        <div class="overlay-box">
                            <h4><a href="project-detail.html">Laxury Home <br>Project</a></h4>
                            <div class="btn-box">
                                <a href="images/gallery/3.jpg" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>
                                <a href="project-detail.html"><i class="fa fa-external-link"></i></a>
                            </div>
                            <span class="tag">Architecture</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Project Section -->

    <!-- Team Section -->
    <section class="team-section">
        <div class="auto-container">
            <div class="sec-title text-center">
                <span class="title">Our Team</span>
                <h2>Perfect Expert</h2>
            </div>

            <div class="row clearfix">
                @foreach($teams as $team)
                    <!-- Team Block -->
                    <div class="team-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image-box">
                                <div class="image">
                                    <a href="#">
                                        <img src="{{ asset($team->image) }}" alt="{{ $team->name }}">
                                    </a>
                                </div>
                                <ul class="social-links">
                                    @if($team->facebook)
                                        <li><a href="{{ $team->facebook }}"><i class="fa fa-facebook"></i></a></li>
                                    @endif
                                    @if($team->twitter)
                                        <li><a href="{{ $team->twitter }}"><i class="fa fa-twitter"></i></a></li>
                                    @endif
                                    @if($team->instagram)
                                        <li><a href="{{ $team->instagram }}"><i class="fa fa-instagram"></i></a></li>
                                    @endif
                                    @if($team->linkedin)
                                        <li><a href="{{ $team->linkedin }}"><i class="fa fa-linkedin"></i></a></li>
                                    @endif
                                </ul>
                                <h3 class="name">
                                    <a href="#">{{ $team->name }}</a>
                                </h3>
                            </div>
                            <span class="designation">{{ $team->position ?? 'Team Member' }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--End Team Section-->


    <!-- Testimonial Section -->
    <section class="testimonial-section">
        <div class="outer-container clearfix">
            <!-- Title Column -->
            <div class="title-column clearfix">
                <div class="inner-column">
                    <div class="sec-title">
                        <span class="float-text">testimonial</span>
                        <h2>What Client Says</h2>
                    </div>
                    <div class="text">Looking at its layout. The point of using very profectly is that it has a more-or-less normal distribution of letters, as opposed</div>
                </div>
            </div>

            <!-- Testimonial Column -->
            <div class="testimonial-column clearfix" style="background-image: url(images/background/4.jpg);">
                <div class="inner-column">
                    <div class="testimonial-carousel owl-carousel owl-theme">
                        <!-- Testimonial Block -->
                        <div class="testimonial-block">
                            <div class="inner-box">
                                <div class="image-box"><img src="images/resource/thumb-1.jpg" alt=""></div>
                                <div class="text">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot.</div>
                                <div class="info-box">
                                    <h4 class="name">Jane Smith</h4>
                                    <span class="designation">CEO, InDesign</span>
                                </div>
                            </div>
                        </div>

                        <!-- Testimonial Block -->
                        <div class="testimonial-block">
                            <div class="inner-box">
                                <div class="image-box"><img src="images/resource/thumb-1.jpg" alt=""></div>
                                <div class="text">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot.</div>
                                <div class="info-box">
                                    <h4 class="name">Jane Smith</h4>
                                    <span class="designation">CEO, InDesign</span>
                                </div>
                            </div>
                        </div>

                        <!-- Testimonial Block -->
                        <div class="testimonial-block">
                            <div class="inner-box">
                                <div class="image-box"><img src="images/resource/thumb-1.jpg" alt=""></div>
                                <div class="text">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot.</div>
                                <div class="info-box">
                                    <h4 class="name">Jane Smith</h4>
                                    <span class="designation">CEO, InDesign</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Testimonial Section -->

    <!-- News Section -->
    <section class="news-section">
        <div class="auto-container">
            <div class="sec-title">
                <span class="float-text">Blogs</span>
                <h2>News & Articals</h2>
            </div>
            <div class="row">
                <!-- News Block -->
                <div class="news-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="images/resource/news-1.jpg" alt=""></figure>
                            <div class="overlay-box"><a href="blog-detail.html"><i class="fa fa-link"></i></a></div>
                        </div>
                        <div class="caption-box">
                            <h3><a href="blog-detail.html">In Good Taste: Mark Finlay Architects & Interiors.</a></h3>
                            <ul class="info">
                                <li>06 June 2023,</li>
                                <li>John Smith</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- News Block -->
                <div class="news-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="images/resource/news-2.jpg" alt=""></figure>
                            <div class="overlay-box"><a href="blog-detail.html"><i class="fa fa-link"></i></a></div>
                        </div>
                        <div class="caption-box">
                            <h3><a href="blog-detail.html">The Lexury Apartment of sepcial interiors.</a></h3>
                            <ul class="info">
                                <li>06 June 2023,</li>
                                <li>John Smith</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- News Block -->
                <div class="news-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="images/resource/news-3.jpg" alt=""></figure>
                            <div class="overlay-box"><a href="blog-detail.html"><i class="fa fa-link"></i></a></div>
                        </div>
                        <div class="caption-box">
                            <h3><a href="blog-detail.html">The Business metting room interior in the rank.</a></h3>
                            <ul class="info">
                                <li>06 June 2023,</li>
                                <li>John Smith</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End News Section -->

    <!--Clients Section-->
    @if ($clients->isNotEmpty())
    <section class="clients-section">
        <div class="inner-container">
            <div class="sponsors-outer">
                <!--Sponsors Carousel-->
                <ul class="sponsors-carousel owl-carousel owl-theme">
                    @foreach($clients as $client)
                    <li class="slide-item">
                        <figure class="image-box">
                            <a href="{{ $client->url ?: '#' }}">
                                <img src="{{ asset($client->logo) }}" alt="{{ $client->name }}">
                            </a>
                        </figure>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    @endif
    <!--End Clients Section-->

@endsection
</x-frontend-layout>
