<x-frontend-layout>
@section('title', $project->title ?? 'Project Detail')

@section('breadcrumb')
<!--Page Title-->
<section class="page-title" style="background-image:url({{ asset('frontEnd/images/pages/bg-title.jpg') }});">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <div class="title-box">
                <h1>{{ $project->title ?? 'Project Detail' }}</h1>
                <span class="title">{{ $project->subtitle ?? 'The Interior speaks for themselves' }}</span>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>{{ $project->title ?? 'Project Detail' }}</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->
@endsection

@section('content')
<!--Project Detail Section-->
<section class="project-details-section">
    <div class="project-detail">
        <div class="auto-container">
            <!-- Upper Box -->
            <div class="upper-box">
                <!--Project Tabs-->
                <div class="project-tabs tabs-box d-flex">
                    <!--Tab Btns-->
                    <ul class="tab-btns tab-buttons clearfix">
                        @foreach($project->media as $index => $media)
                            <li data-tab="#tab-{{ $index+1 }}" class="tab-btn {{ $index === 0 ? 'active-btn' : '' }}">
                                <img src="{{ asset($media->file_path) }}" alt="Project Image {{ $index+1 }}">
                            </li>
                        @endforeach
                    </ul>

                    <!--Tabs Container-->
                    <div class="tabs-content">
                        @foreach($project->media as $index => $media)
                            <div class="tab {{ $index === 0 ? 'active-tab' : '' }}" id="tab-{{ $index+1 }}">
                                <figure class="image">
                                    <a href="{{ asset($media->file_path) }}" class="lightbox-image" data-fancybox="images">
                                        <img src="{{ asset($media->file_path) }}" alt="Project Image {{ $index+1 }}">
                                    </a>
                                </figure>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!--Lower Content-->
            <div class="lower-content"> 
                <div class="row clearfix">
                    <!--Content Column-->
                    <div class="content-column col-lg-8 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <p>{!! $project->description ?? 'No description available.' !!}</p> 
                        </div>
                    </div>
                    
                    <!--Info Column-->
                    <div class="info-column col-lg-4 col-md-12 col-sm-12">
                        <div class="inner-column wow fadeInRight">
                            <h3>Project Information</h3>
                            <ul class="info-list">
                                <li><strong>Client :</strong> {{ $project->client_name ?? 'N/A' }}</li>
                                <li><strong>Location :</strong> {{ $project->location ?? 'N/A' }}</li>
                                <li><strong>Surface Area :</strong> {{ $project->area_size ?? 'N/A' }} m²</li>
                                <li><strong>Year Completed :</strong> {{ $project->build_year ?? 'N/A' }}</li>
                                <li><strong>Value :</strong> {{ $project->price ? '$' . number_format($project->price, 2) : 'N/A' }}</li>
                                <li><strong>Architect :</strong> {{ $project->architect ?? 'N/A' }}</li>
                            </ul>

                            <!--Help Box-->
                            <div class="help-box-two">
                                <div class="inner">
                                    <span class="title">Quick Contact</span>
                                    <h2>Get Solution</h2>
                                    <div class="text">Contact us at the Interior office nearest to you or submit a business inquiry online.</div>
                                    <a class="theme-btn btn-style-two" href="{{ route('page.contact') }}">Contact</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Portfolio Details-->
@endsection
</x-frontend-layout>
