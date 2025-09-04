<x-frontend-layout>
@section('title', 'Projects')
@section('breadcrumb')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{ asset('frontEnd/images/pages/bg-title.jpg') }});">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1>Projects</h1>
                    <span class="title">The Interior speak for themselves</span>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>Projects</li>
                </ul>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <!-- Projects Section -->
    <section class="projects-section alternate">
        <div class="auto-container">
            <div class="mixitup-gallery">

                <!-- Filter Tabs (Dynamic Categories) -->
                <div class="filters text-center clearfix">
                    <ul class="filter-tabs filter-btns clearfix">
                        <li class="active filter" data-filter="all">All</li>
                        @foreach($projects->pluck('category.category_name')->unique() as $cat)
                            <li class="filter" data-filter=".{{ Str::slug($cat) }}">{{ strtoupper($cat) }}</li>
                        @endforeach
                    </ul>
                </div>

                <!-- Project Blocks -->
                <div class="filter-list row">
                    @foreach($projects as $project)
                        @php
                            $defaultMedia = $project->media->where('is_default', true)->first();
                            $imagePath = $defaultMedia ? asset($defaultMedia->file_path) : asset('images/placeholder.jpg');
                        @endphp

                        <div class="project-block all mix {{ Str::slug($project->category->category_name ?? '') }} col-lg-4 col-md-6 col-sm-12">
                            <div class="image-box">
                                <figure class="image">
                                    <img src="{{ $imagePath }}" alt="{{ $project->title }}">
                                </figure>
                                <div class="overlay-box">
                                    <h4>
                                        <a href="{{ route('page.projects-details', $project->slug) }}">
                                            {{ $project->title }}
                                        </a>
                                    </h4>
                                    <div class="btn-box">
                                        <a href="{{ $imagePath }}" class="lightbox-image" data-fancybox="gallery">
                                            <i class="fa fa-search"></i>
                                        </a>
                                        <a href="{{ route('page.projects-details', $project->slug) }}">
                                            <i class="fa fa-external-link"></i>
                                        </a>
                                    </div>
                                    <span class="tag">{{ $project->category->category_name ?? 'Uncategorized' }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

            <!-- Pagination -->
            <div class="styled-pagination">
                {{ $projects->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </section>
@endsection
</x-frontend-layout>
