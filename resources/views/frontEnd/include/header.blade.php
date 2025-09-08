
<!-- Main Header-->
<header class="main-header header-style-one">
    <section class="header-contact" style=""> 
        <p>
            Phone : <a href="tel:01715668144" class="animated-phone">+880 1715 668144</a>
        </p>
    </section>
    <style>
        .header-contact{
            background-color: #35e737; height: 40px;
        }
        .header-contact p{
            text-align: center; padding-top: 10px; font-weight: bold;
        }
        .header-contact p a {
            color: #1f1f1f; font-weight: bold;
        }
        .header-contact p a:hover{
            color: #ffffff;
        }
    </style>

    <div class="auto-container">
        <div class="header-lower">
            <div class="main-box clearfix">
                <div class="logo-box">
                    <div class="logo"><a href="{{url('/')}}"><img src="{{asset('frontEnd')}}/images/logo.png" style="height: 68px; width: auto;" alt="" title=""></a></div>
                </div>

                <div class="nav-outer clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md ">
                        <div class="navbar-header">
                            <!-- Toggle Button -->      
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon flaticon-menu-button"></span>
                            </button>
                        </div>
                        @php
                            $services = App\Models\Service::where('status', 1)->get();
                        @endphp
                        
                        <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li class="{{ request()->is('/') ? 'current' : '' }}"><a href="{{url('/')}}">Home</a></li>
                                <li class="{{ request()->is('page/about-us') ? 'current' : '' }}"><a href="{{route('page.about-us')}}">About</a></li>
                                <li class="{{ request()->is('page/services*') ? 'current' : '' }} dropdown"><a href="#">Services</a>
                                    {{-- <li><a href="{{route('page.services')}}">All Services</a></li> --}}
                                    <ul>
                                        @foreach ($services as $service)
                                            <li><a href="{{route('page.services-details', $service->slug)}}">{{$service->title}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="{{ request()->is('page/projects*') ? 'current' : '' }}"><a href="{{route('page.projects')}}">Projects</a></li>
                                <li class="{{ request()->is('page/personal-info') ? 'current' : '' }}"><a href="{{route('page.personal-info')}}">Ar. Ismaiel Parvez</a></li>
                                <li class="{{ request()->is('page/blogs*') ? 'current' : '' }}"><a href="{{route('page.blogs')}}">Blog</a></li>
                                <li class="{{ request()->is('page/contact') ? 'current' : '' }}"><a href="{{route('page.contact')}}">Contact</a></li>
                            </ul>
                        </div>
                    </nav><!-- Main Menu End-->                        

                    <!-- Outer Box-->
                    <div class="outer-box">
                        <!--Search Box-->
                        <div class="search-box-outer">
                            <div class="dropdown">
                                <button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-search"></span></button>
                                <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu3">
                                    <li class="panel-outer">
                                        <div class="form-container">
                                            <form method="post" action="https://expert-themes.com/html/contra/blog.html">
                                                <div class="form-group">
                                                    <input type="search" name="field-name" value="" placeholder="Search Here" required>
                                                    <button type="submit" class="search-btn"><span class="fa fa-search"></span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--End Main Header -->
