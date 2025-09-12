<x-frontend-layout>
@section('title', $service->seo->title ?? $service->title)

@section('breadcrumb')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{ asset('frontEnd/images/pages/bg-title.jpg') }});">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1>{{ $service->title }}</h1>
                    @if($service->seo?->meta_description)
                        <span class="title">{{ $service->seo->meta_description }}</span>
                    @endif
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>{{ $service->title }}</li>
                </ul>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                
                <!--Sidebar-->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar services-sidebar">
                        
                        <!-- All Services List -->
                        <div class="sidebar-widget sidebar-blog-category">
                            <ul class="blog-cat">
                                @foreach($allServices as $s)
                                    <li class="{{ $s->slug === $service->slug ? 'active' : '' }}">
                                        <a href="{{ route('page.services-details', $s->slug) }}">{{ strtoupper($s->title) }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Dynamic Brochures (Attachments) -->
                        @if($service->attachments->count())
                            <div class="sidebar-widget brochure-widget">
                                <h3 class="sidebar-title">Download Brochures</h3>
                                @foreach($service->attachments as $file)
                                    <div class="brochure-box">
                                        <div class="inner">
                                            <span class="icon fa fa-file-{{ $file->file_extension }}-o"></span>
                                            <div class="text">{{ $file->name }}</div>
                                        </div>
                                        <a href="{{ $file->file_url }}" class="overlay-link" target="_blank"></a>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <!-- Quick Contact -->
                        <div class="help-box" style="background-image:url({{ asset('frontEnd/images/resource/brochure-bg.jpg') }})">
                            <div class="inner">
                                <span class="title">Quick Contact</span>
                                <h2>Get Solution</h2>
                                <div class="text">Contact us at the Interior office nearest to you or submit a business inquiry online.</div>
                                <a class="theme-btn btn-style-three" href="{{route('page.contact')}}">Contact</a>
                            </div>
                        </div>
                    </aside>
                </div>

                <!--Main Content-->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                    <div class="service-detail">
                        <div class="inner-box">
                            <!-- Images Carousel -->
                            @if($service->media->count())
                                <div class="image-box">
                                    <div class="single-item-carousel owl-carousel owl-theme">
                                        @foreach($service->media as $img)
                                            <figure class="image">
                                                <img src="{{ asset($img->file_path) }}" alt="{{ $img->caption ?? $service->title }}">
                                            </figure>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <h2>{{ $service->title }}</h2>
                            <div class="text">
                                {!! $service->description !!}

                                <!-- Key Features -->
                                <div class="two-column row">
                                    <div class="column col-lg-6 col-md-6 col-sm-12">
                                        <h3>Our Key Features</h3>
                                        <ul>
                                            @foreach($service->features as $feature)
                                                <li>{{ $feature->feature_name }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="column col-lg-6 col-md-6 col-sm-12">
                                        <div class="image">
                                            <img src="{{ asset('frontEnd/images/bg-logo.jpg') }}" alt="">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Message For CEO -->
                        <blockquote>Who do not know how to pursue pleasure rationally encounters consequences that are extremely painful nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain,<cite>Ar. Ismaiel Parvez</cite></blockquote>

                        <!-- Product Info Tabs (Example content; replace or loop from DB if needed) -->
                        <div class="product-info-tabs">
                            <div class="prod-tabs tabs-box">
                                <ul class="tab-btns tab-buttons clearfix">
                                    <li data-tab="#precautions" class="tab-btn active-btn">Precautions</li>
                                    <li data-tab="#intelligence" class="tab-btn">Intelligence</li>
                                    <li data-tab="#specializations" class="tab-btn">Specializations</li>
                                </ul>
                                <div class="tabs-content">
                                    <div class="tab active-tab" id="precautions">
                                        <div class="content">
                                            {!! $service->seo?->meta_keywords ?? 'Add your precautions content here' !!}
                                        </div>
                                    </div>
                                    <div class="tab" id="intelligence">
                                        <div class="content">
                                            <p>Add your intelligence content here</p>
                                        </div>
                                    </div>
                                    <div class="tab" id="specializations">
                                        <div class="content">
                                            <p>Add your specializations content here</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Tabs -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
</x-frontend-layout>
