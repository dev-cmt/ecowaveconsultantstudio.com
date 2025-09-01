<x-frontend-layout>
@section('title', 'Contact Us')
@section('breadcrumb')
    <!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/2.jpg);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1>Contact Us</h1>
                    <span class="title">The Interior speak for themselves</span>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.html">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
@endsection
@section('content')

    <!-- Contact Page Section -->
    <section class="contact-page-section">
        <div class="auto-container">
            <div class="row">
                <!-- Form Column -->
                <div class="form-column col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="sec-title">
                            <span class="float-text">informaer</span>
                            <h2>Contact Us</h2>
                        </div>

                        <div class="contact-form">
                            <form method="post" action="">
                                <div class="row">
                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                        <input type="text" name="username" placeholder="Name" required="">
                                    </div>
                                    
                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                        <input type="text" name="phone" placeholder="Phone" required="">
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                        <input type="text" name="company" placeholder="Company">
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                        <input type="email" name="email" placeholder="Email" required="">
                                    </div>

                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <textarea name="message" placeholder="Massage"></textarea>
                                    </div>

                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <button class="theme-btn btn-style-three" type="submit" name="submit-form">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="contact-info">
                            <div class="row">
                                <div class="info-block col-lg-4 col-md-4 col-sm-12">
                                    <div class="inner">
                                        <h4>Location</h4>
                                        <p>Complax interprice company, 882 street Latrobe, PA 15786</p>
                                    </div>
                                </div>

                                <div class="info-block col-lg-4 col-md-4 col-sm-12">
                                    <div class="inner">
                                        <h4>Call Us</h4>
                                        <p>+88 169 787 5256</p>
                                        <p>+88 165 358 5678</p>
                                    </div>

                                </div>

                                <div class="info-block col-lg-4 col-md-4 col-sm-12">
                                    <div class="inner">
                                        <h4>Email</h4>
                                        <p><a href="#">support@contra.com</a></p>
                                        <p><a href="#">info@contra.com</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="map-column col-lg-5 col-md-12 col-sm-12">
                    <div class="inner-column">
                         <div class="map-outer">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25216.765666144616!2d144.9456413371385!3d-37.8112271492458!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642b8c21cb29b%3A0x1c045678462e3510!2sMelbourne%20VIC%203000%2C%20Australia!5e0!3m2!1sen!2s!4v1598636873068!5m2!1sen!2s" height="900"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Contact Page Section -->

    <!--Clients Section-->
    <section class="clients-section style-two">
        <div class="auto-container">
            <div class="sponsors-outer">
                <!--Sponsors Carousel-->
                <ul class="sponsors-carousel owl-carousel owl-theme">
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/1.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/2.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/3.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/4.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/5.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/1.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/2.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/3.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/4.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/5.png" alt=""></a></figure></li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Clients Section-->


    <!-- ============================ Contact List Start ================================== -->
    <section>
        <div class="container">
            <!-- row Start -->
            <div class="row">
                <div class="col-lg-7 col-md-7">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('page.contact.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control simple" value="{{ old('name') }}" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control simple" value="{{ old('email') }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" name="subject" class="form-control simple" value="{{ old('subject') }}" required>
                        </div>

                        <div class="form-group">
                            <label>Message</label>
                            <textarea class="form-control simple" name="message" rows="5" required>{{ old('message') }}</textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-main px-5 rounded" type="submit">Submit Request</button>
                        </div>
                    </form>
                </div>

                <div class="col-lg-5 col-md-5">
                    <div class="contact-info">
                        <h2>Get In Touch</h2>
                        <p>{{ $contactInfo->description ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' }}</p>

                        <div class="cn-info-detail">
                            <div class="cn-info-icon">
                                <i class="fa-solid fa-house"></i>
                            </div>
                            <div class="cn-info-content">
                                <h4 class="cn-info-title">Reach Us</h4>
                                {{ $contactInfo->address ?? '' }}
                            </div>
                        </div>

                        <div class="cn-info-detail">
                            <div class="cn-info-icon">
                                <i class="fa-solid fa-envelope-circle-check"></i>
                            </div>
                            <div class="cn-info-content">
                                <h4 class="cn-info-title">Drop A Mail</h4>
                                {{ $contactInfo->email ?? '' }} <br>
                                {{ $contactInfo->email2 ?? '' }}
                            </div>
                        </div>

                        <div class="cn-info-detail">
                            <div class="cn-info-icon">
                                <i class="fa-solid fa-phone-volume"></i>
                            </div>
                            <div class="cn-info-content">
                                <h4 class="cn-info-title">Call Us</h4>
                                {{ $contactInfo->phone ?? '' }} <br>
                                {{ $contactInfo->phone2 ?? '' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
    </section>
    <!-- ============================ Contact List End ================================== -->
@endsection
</x-frontend-layout>
