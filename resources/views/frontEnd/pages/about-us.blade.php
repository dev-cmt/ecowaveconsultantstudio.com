<x-frontend-layout>
@section('title', 'Home')
@section('breadcrumb')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{asset('frontEnd/images/pages/bg-title.jpg')}});">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1>About Us</h1>
                    <span class="title">The Interior speak for themselves</span>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.html">Home</a></li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
@endsection
@section('content')
    <!-- About Section -->
    <section class="about-section" style="background-image: url({{asset('frontEnd/images/pages/bg-about-us.jpg') }});">
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

    <!-- Fast Count -->
    <section class="fun-fact-and-features alternate"  style="background-image: url({{asset('frontEnd/images/pages/bg-achievement.jpg')}});">
        <div class="outer-box">
            <div class="auto-container">
                
                @if (!empty($achievements))
                <!-- Fact Counter -->
                <div class="fact-counter">
                    <div class="row">
                        @foreach($achievements as $index => $achievement)
                        <!--Column-->
                        <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp">
                            <div class="count-box">
                                <div class="count"><span class="count-text" data-speed="5000" data-stop="{{ $achievement->count ?? 0 }}">0</span>{{ $achievement->suffix ?? '' }}</div>
                                <h4 class="counter-title">{!! nl2br($achievement->title) !!}</h4>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Features -->
                <div class="features">
                    <div class="row">
                        <!-- Feature Block -->
                        <div class="feature-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="icon-box" style="width: 80px">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M64 112C64 85.5 85.5 64 112 64L208 64C234.5 64 256 85.5 256 112L256 480C256 533 213 576 160 576C107 576 64 533 64 480L64 112zM304 473.6L304 202.1L352.1 154C370.8 135.3 401.2 135.3 420 154L487.9 221.9C506.6 240.6 506.6 271 487.9 289.8L304 473.6zM269.5 576L461.5 384L528.1 384C554.6 384 576.1 405.5 576.1 432L576.1 528C576.1 554.5 554.6 576 528.1 576L269.6 576zM144 128C135.2 128 128 135.2 128 144L128 176C128 184.8 135.2 192 144 192L176 192C184.8 192 192 184.8 192 176L192 144C192 135.2 184.8 128 176 128L144 128zM128 272L128 304C128 312.8 135.2 320 144 320L176 320C184.8 320 192 312.8 192 304L192 272C192 263.2 184.8 256 176 256L144 256C135.2 256 128 263.2 128 272zM160 504C173.3 504 184 493.3 184 480C184 466.7 173.3 456 160 456C146.7 456 136 466.7 136 480C136 493.3 146.7 504 160 504z"/></svg>
                                </div>
                                <h3><a href="{{route('page.services')}}">Perfect Design</a></h3>
                                <div class="text">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</div>
                                <div class="link-box"><a href="{{route('page.services')}}">Read More</a></div>
                            </div>
                        </div>

                        <!-- Feature Block -->
                        <div class="feature-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="icon-box" style="width: 80px">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M163.3 320.1L232.7 200.2C227.1 188 223.9 174.4 223.9 160C223.9 107 266.9 64 319.9 64C372.9 64 415.9 107 415.9 160C415.9 174.3 412.8 187.9 407.1 200.2L451.5 276.9C428.4 302.9 397.8 322 363.1 330.7L320 255.9L251.9 373.5C273.4 380.3 296.2 384 320 384C390.7 384 453.8 351.3 494.9 300C506 286.2 526.1 284 539.9 295C553.7 306 555.9 326.2 544.9 340C492.2 405.8 411 448 320.1 448C284.7 448 250.7 441.6 219.4 429.9L162.7 527.7C158 535.8 151 542.4 142.6 546.6L87.2 574.3C82.2 576.8 76.3 576.5 71.6 573.6C66.9 570.7 64 565.5 64 560L64 504.6C64 496.2 66.2 487.9 70.5 480.5L130.5 376.8C117.7 365.6 105.9 353.3 95.2 340C84.1 326.2 86.4 306.1 100.2 295C114 283.9 134.1 286.2 145.2 300C150.9 307.1 157 313.8 163.4 320.1zM445.1 471.9C477.6 458.9 507.5 440.9 534 419L569.6 480.5C573.8 487.8 576.1 496.1 576.1 504.6L576.1 560C576.1 565.5 573.2 570.7 568.5 573.6C563.8 576.5 557.9 576.8 552.9 574.3L497.5 546.6C489.1 542.4 482.1 535.8 477.4 527.7L445.1 471.9zM320 192C337.7 192 352 177.7 352 160C352 142.3 337.7 128 320 128C302.3 128 288 142.3 288 160C288 177.7 302.3 192 320 192z"/></svg>
                                </div>
                                <h3><a href="{{route('page.services')}}">Carefully Planned</a></h3>
                                <div class="text">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</div>
                                <div class="link-box"><a href="{{route('page.services')}}">Read More</a></div>
                            </div>
                        </div>

                        <!-- Feature Block -->
                        <div class="feature-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="icon-box" style="width: 80px">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M348 62.7C330.7 52.7 309.3 52.7 292 62.7L207.8 111.3C190.5 121.3 179.8 139.8 179.8 159.8L179.8 261.7L91.5 312.7C74.2 322.7 63.5 341.2 63.5 361.2L63.5 458.5C63.5 478.5 74.2 497 91.5 507L175.8 555.6C193.1 565.6 214.5 565.6 231.8 555.6L320.1 504.6L408.4 555.6C425.7 565.6 447.1 565.6 464.4 555.6L548.5 507C565.8 497 576.5 478.5 576.5 458.5L576.5 361.2C576.5 341.2 565.8 322.7 548.5 312.7L460.2 261.7L460.2 159.8C460.2 139.8 449.5 121.3 432.2 111.3L348 62.7zM296 356.6L296 463.1L207.7 514.1C206.5 514.8 205.1 515.2 203.7 515.2L203.7 409.9L296 356.6zM527.4 357.2C528.1 358.4 528.5 359.8 528.5 361.2L528.5 458.5C528.5 461.4 527 464 524.5 465.4L440.2 514C439 514.7 437.6 515.1 436.2 515.1L436.2 409.8L527.4 357.2zM412.3 159.8L412.3 261.7L320 315L320 208.5L411.2 155.9C411.9 157.1 412.3 158.5 412.3 159.9z"/></svg>
                                </div>
                                <h3><a href="service-detail.html">Smartly Execute</a></h3>
                                <div class="text">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</div>
                                <div class="link-box"><a href="service-detail.html">Read More</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fast Count End-->

    <!-- Testimonial Section Two-->
    @if (!empty($testimonials))
    <section class="testimonial-section-two">
        <div class="auto-container">
            <div class="sec-title">
                <span class="float-text">Testimonial</span>
                <h2>What Clients Says</h2>
            </div>

            <div class="testimonial-carousel-two owl-carousel owl-theme">
                @foreach($testimonials as $testimonial)
                    <div class="testimonial-block-two">
                        <div class="inner-box">
                            <div class="text">
                                {{ $testimonial->content }}
                            </div>
                            <div class="info-box">
                                <div class="thumb">
                                    <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->client_name }}">
                                </div>
                                <h5 class="name">{{ $testimonial->client_name }}</h5>
                                @if($testimonial->position || $testimonial->company)
                                    <span class="designation">
                                        {{ $testimonial->position }} {{ $testimonial->company ? 'at ' . $testimonial->company : '' }}
                                    </span>
                                @endif
                                <span class="date">{{ $testimonial->created_at->format('F d - Y') }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <!--End Testimonial Section Two-->

    <!--Clients Section-->
    @if (!empty($clients))
    <section class="clients-section style-two">
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

     <!-- Process Section -->
    <section class="process-section" style="background-image: url({{asset('frontEnd/images/pages/bg-process.jpg')}});">
        <div class="auto-container">
            <div class="sec-title light">
                <span class="float-text">HOW WE WORK</span>
                <h2>Proven Process</h2>
            </div>
            <div class="row">
                <!-- Process Block -->
                <div class="process-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <span class="count">01</span>
                        <h4><a href="service-detail.html">Concept</a></h4>
                        <div class="text">When an unknown printer took a galley of type and scrambled it to make a book.</div>
                        <div class="link-box"><a href="service-detail.html">Read More</a></div>
                    </div>
                </div>

                <!-- Process Block -->
                <div class="process-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <span class="count">02</span>
                        <h4><a href="service-detail.html">Idea</a></h4>
                        <div class="text">When an unknown printer took a galley of type and scrambled it to make a book.</div>
                        <div class="link-box"><a href="service-detail.html">Read More</a></div>
                    </div>
                </div>

                <!-- Process Block -->
                <div class="process-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <span class="count">03</span>
                        <h4><a href="service-detail.html">Design</a></h4>
                        <div class="text">When an unknown printer took a galley of type and scrambled it to make a book.</div>
                        <div class="link-box"><a href="service-detail.html">Read More</a></div>
                    </div>
                </div>

                <!-- Process Block -->
                <div class="process-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <span class="count">04</span>
                        <h4><a href="service-detail.html">excecution</a></h4>
                        <div class="text">When an unknown printer took a galley of type and scrambled it to make a book.</div>
                        <div class="link-box"><a href="service-detail.html">Read More</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Process Section -->

    <!-- Team Section -->
    @if (!empty($teams))
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
    @endif
    <!--End Team Section-->

    <!-- Offer Section -->
    <section class="offer-section" style="background-image: url({{asset('frontEnd/images/pages/bg-offer.jpg')}});">
        <div class="auto-container">
            <div class="row">
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <span class="title">Special Offer</span>
                        <h2><span>How to save </span> <br>of money on repairs</h2>
                        <span class="discount">50%</span>
                        <div class="text">Fill out the form to download a book with 10 tips<br> on how to save your money</div>
                    </div>
                </div> 

                <div class="form-column order-last col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="discount-form">
                            <!--Comment Form-->
                            <form method="post" action="https://expert-themes.com/html/contra/blog.html">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <input type="text" name="username" placeholder="Name" required>
                                    </div>
                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <input type="email" name="email" placeholder="Email" required>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <input type="text" name="phone" placeholder="Phone" required>
                                    </div>
                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <textarea name="message" placeholder="Massage"></textarea>
                                    </div>
                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group text-center">
                                        <button class="theme-btn btn-style-one" type="submit" name="submit-form">send Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </section>
    <!--End Offer Section -->

    <!-- Video Section -->
    <section class="video-section style-two">
        <div class="outer-box">
            <div class="auto-container">
                <div class="row">
                    <div class="content-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="sec-title">
                                <span class="float-text">See Video</span>
                                <h2>Campaign Video</h2>
                            </div>
                            <span class="title">We Give You The Best</span>
                            <div class="text">Present all the speakers and participants in GenesisExpo`s beautiful layouts. Choose your favorite variant of layout and create your own. You can create also single speaker profile with all relevant information.</div> 
                        </div>
                    </div>

                    <!-- Video Column -->
                    <div class="video-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="video-box">
                                 <figure class="image"><img src="{{asset('frontEnd/images/pages/video-img.jpg')}}" alt="">
                                    <a href="https://www.youtube.com/watch?v=Fvae8nxzVz4" class="link" data-fancybox="gallery" data-caption=""><span class="icon fa fa-play"></span></a>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Video Section -->
@endsection
</x-frontend-layout>
