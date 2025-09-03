<x-frontend-layout>
@section('title', 'Projects')
@section('breadcrumb')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{asset('frontEnd/images/pages/bg-title.jpg')}});">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1>Projects</h1>
                    <span class="title">The Interior speak for themselves</span>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>Projects</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
@endsection
@section('content')
    <!-- Projects Section -->
    <section class="projects-section alternate">
        <div class="auto-container">
             <!--MixitUp Galery-->
            <div class="mixitup-gallery">
                <!--Filter-->
                <div class="filters text-center clearfix">                     
                    <ul class="filter-tabs filter-btns clearfix">
                        <li class="active filter" data-role="button" data-filter="all">All</li>
                        <li class="filter" data-role="button" data-filter=".commercial">COMMERCIAL</li>
                        <li class="filter" data-role="button" data-filter=".landescape">LANDESCAPE</li>
                        <li class="filter" data-role="button" data-filter=".interior">INTERIOR</li>
                        <li class="filter" data-role="button" data-filter=".architecture">ARCHITECTURE</li>
                    </ul>                                                  
                </div>
                                            
                <div class="filter-list row">
                    <!-- Project Block -->
                    <div class="project-block all mix interior architecture landescape col-lg-4 col-md-6 col-sm-12">
                        <div class="image-box">
                            <figure class="image"><img src="images/gallery/2-1.html" alt=""></figure>
                            <div class="overlay-box">
                                <h4><a href="project-detail.html">Laxury Home <br>Project</a></h4>
                                <div class="btn-box">
                                    <a href="images/gallery/2-1.html" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>
                                    <a href="project-detail.html"><i class="fa fa-external-link"></i></a>
                                </div>
                                <span class="tag">Architecture</span>
                            </div>
                        </div>
                    </div>

                    <!-- Project Block -->
                    <div class="project-block all mix landescape architecture col-lg-8 col-md-6 col-sm-12">
                        <div class="image-box">
                            <figure class="image"><img src="images/gallery/2-2.html" alt=""></figure>
                            <div class="overlay-box">
                                <h4><a href="project-detail.html">Laxury Home <br>Project</a></h4>
                                <div class="btn-box">
                                    <a href="images/gallery/2-2.html" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>
                                    <a href="project-detail.html"><i class="fa fa-external-link"></i></a>
                                </div>
                                <span class="tag">Architecture</span>
                            </div>
                        </div>
                    </div>

                    <!-- Project Block -->
                    <div class="project-block all mix landescape interior col-lg-6 col-md-6 col-sm-12">
                        <div class="image-box">
                            <figure class="image"><img src="images/gallery/2-3.html" alt=""></figure>
                            <div class="overlay-box">
                                <h4><a href="project-detail.html">Laxury Home <br>Project</a></h4>
                                <div class="btn-box">
                                    <a href="images/gallery/2-3.html" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>
                                    <a href="project-detail.html"><i class="fa fa-external-link"></i></a>
                                </div>
                                <span class="tag">Architecture</span>
                            </div>
                        </div>
                    </div>

                    <!-- Project Block -->
                    <div class="project-block all mix landescape commercial architecture col-lg-6 col-md-6 col-sm-12">
                        <div class="image-box">
                            <figure class="image"><img src="images/gallery/2-4.html" alt=""></figure>
                            <div class="overlay-box">
                                <h4><a href="project-detail.html">Laxury Home <br>Project</a></h4>
                                <div class="btn-box">
                                    <a href="images/gallery/2-4.html" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>
                                    <a href="project-detail.html"><i class="fa fa-external-link"></i></a>
                                </div>
                                <span class="tag">Architecture</span>
                            </div>
                        </div>
                    </div>

                    <!-- Project Block -->
                    <div class="project-block all mix landescape interior col-lg-4 col-md-6 col-sm-12">
                        <div class="image-box">
                            <figure class="image"><img src="images/gallery/2-5.html" alt=""></figure>
                            <div class="overlay-box">
                                <h4><a href="project-detail.html">Laxury Home <br>Project</a></h4>
                                <div class="btn-box">
                                    <a href="images/gallery/2-5.html" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>
                                    <a href="project-detail.html"><i class="fa fa-external-link"></i></a>
                                </div>
                                <span class="tag">Architecture</span>
                            </div>
                        </div>
                    </div>

                    <!-- Project Block -->
                    <div class="project-block all mix landescape commercial interior col-lg-4 col-md-6 col-sm-12">
                        <div class="image-box">
                            <figure class="image"><img src="images/gallery/2-6.html" alt=""></figure>
                            <div class="overlay-box">
                                <h4><a href="project-detail.html">Laxury Home <br>Project</a></h4>
                                <div class="btn-box">
                                    <a href="images/gallery/2-6.html" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>
                                    <a href="project-detail.html"><i class="fa fa-external-link"></i></a>
                                </div>
                                <span class="tag">Architecture</span>
                            </div>
                        </div>
                    </div>

                    <!-- Project Block -->
                    <div class="project-block all mix landescape interior col-lg-4 col-md-6 col-sm-12">
                        <div class="image-box">
                            <figure class="image"><img src="images/gallery/2-7.html" alt=""></figure>
                            <div class="overlay-box">
                                <h4><a href="project-detail.html">Laxury Home <br>Project</a></h4>
                                <div class="btn-box">
                                    <a href="images/gallery/2-7.html" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>
                                    <a href="project-detail.html"><i class="fa fa-external-link"></i></a>
                                </div>
                                <span class="tag">Architecture</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!--Post Share Options-->
            <div class="styled-pagination">
                <ul class="clearfix">
                    <li class="prev-post"><a href="#"><span class="fa fa-long-arrow-left"></span> Prev</a></li>
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li class="next-post"><a href="#"> Next <span class="fa fa-long-arrow-right"></span> </a></li>
                </ul>
            </div>
        </div>
    </section>
@endsection
</x-frontend-layout>
