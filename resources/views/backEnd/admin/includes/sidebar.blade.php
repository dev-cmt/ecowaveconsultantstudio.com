<aside class="app-sidebar sticky" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="{{ route('dashboard') }}" class="header-logo">
            <img src="{{ asset($settings ? $settings->logo : '') }}" alt="logo">
        </a>
    </div>
    <!-- End::main-sidebar-header -->

    <!-- Start::main-sidebar -->
    <div class="main-sidebar" id="sidebar-scroll">

        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg>
            </div>
            <ul class="main-menu">

                <!-- Dashboard -->
                <li class="slide">
                    <a href="{{ route('dashboard') }}"
                        class="side-menu__item {{ Request::is('admin') ? 'active' : '' }}">
                        <i class="bx bxs-dashboard side-menu__icon"></i>
                        <span class="side-menu__label">Dashboard</span>
                    </a>
                </li>

                <!-- Category -->
                <li class="slide">
                    <a href="{{ route('admin.categories.index') }}"
                        class="side-menu__item {{ Request::is('admin/categories*') ? 'active' : '' }}">
                        <i class="bx bx-layer side-menu__icon"></i>
                        <span class="side-menu__label">Category</span>
                    </a>
                </li>

                <!-- Feature -->
                <li class="slide">
                    <a href="{{ route('admin.features.index') }}"
                        class="side-menu__item {{ Request::is('admin/features*') ? 'active' : '' }}">
                        <i class="bx bx-task side-menu__icon"></i>
                        <span class="side-menu__label">Feature</span>
                    </a>
                </li>

                <!-- Services -->
                <li class="slide">
                    <a href="{{ route('admin.services.index') }}"
                        class="side-menu__item {{ Request::is('admin/services*') ? 'active  ' : '' }}">
                        <i class="bx bx-cog side-menu__icon"></i>
                        <span class="side-menu__label">Services</span>
                    </a>
                </li>


                <!-- Testimonial -->
                <li class="slide">
                    <a href="{{ route('admin.testimonials.index') }}"
                        class="side-menu__item {{ Request::is('admin/testimonials*') ? 'active' : '' }}">
                        <i class="bx bx-comment-detail side-menu__icon"></i>
                        <span class="side-menu__label">Testimonial</span>
                    </a>
                </li>

                <!-- Story -->
                <li class="slide">
                    <a href="{{ route('admin.story.index') }}"
                        class="side-menu__item {{ Request::is('admin/story*') ? 'active' : '' }}">
                        <i class="bx bx-book side-menu__icon"></i>
                        <span class="side-menu__label">Story</span>
                    </a>
                </li>

                <!-- Achievement -->
                <li class="slide">
                    <a href="{{ route('admin.achievements.index') }}"
                        class="side-menu__item {{ Request::is('admin/achievements*') ? 'active' : '' }}">
                        <i class="bx bx-trophy side-menu__icon"></i>
                        <span class="side-menu__label">Achievement</span>
                    </a>
                </li>

                <!-- Project -->
                <li class="slide">
                    <a href="{{ route('admin.projects.index') }}"
                        class="side-menu__item {{ Request::is('admin/projects*') ? 'active' : '' }}">
                        <i class="bx bx-network-chart side-menu__icon"></i>
                        <span class="side-menu__label">Project</span>
                    </a>
                </li>

                <!-- Team -->
                <li class="slide">
                    <a href="{{ route('admin.team.index') }}"
                        class="side-menu__item {{ Request::is('admin/team*') ? 'active' : '' }}">
                        <i class="bx bx-group side-menu__icon"></i>
                        <span class="side-menu__label">Team</span>
                    </a>
                </li>

                <!-- Clients -->
                <li class="slide">
                    <a href="{{ route('admin.clients.index') }}"
                        class="side-menu__item {{ Request::is('admin/clients*') ? 'active' : '' }}">
                        <i class="bx bx-briefcase side-menu__icon"></i>
                        <span class="side-menu__label">Clients</span>
                    </a>
                </li>

                <!-- Mission -->
                <li class="slide">
                    <a href="{{ route('admin.mission.index') }}"
                        class="side-menu__item {{ Request::is('admin/mission*') ? 'active' : '' }}">
                        <i class="bx bx-flag side-menu__icon"></i>
                        <span class="side-menu__label">Mission</span>
                    </a>
                </li>

                <!-- Contact Information -->
                <li class="slide">
                    <a href="{{ route('admin.contact.index') }}"
                        class="side-menu__item {{ Request::is('admin/contact*') ? 'active' : '' }}">
                        <i class="bx bx-envelope side-menu__icon"></i>
                        <span class="side-menu__label">Contact Information</span>
                    </a>
                </li>

                <!-- Contact Submissions -->
                <li class="slide">
                    <a href="{{ route('admin.contact.submissions.index') }}"
                        class="side-menu__item {{ Request::is('admin/contact/submissions*') ? 'active' : '' }}">
                        <i class="bx bx-party side-menu__icon"></i>
                        <span class="side-menu__label">Contact Submissions</span>
                    </a>
                </li>

                <!-- Blogs -->
                <li class="slide">
                    <a href="{{ route('admin.blogs.index') }}"
                        class="side-menu__item {{ Request::is('admin/blogs*') ? 'active' : '' }}">
                        <i class="bx bx-news side-menu__icon"></i>
                        <span class="side-menu__label">Blogs & News</span>
                    </a>
                </li>
                


                <!-- Authentication -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-fingerprint side-menu__icon"></i>
                        <span class="side-menu__label">Authentication</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1" data-popper-placement="bottom">
                        <li class="slide">
                            <a href="{{ route('admin.roles.index') }}" class="side-menu__item">
                                Role & Permission
                            </a>
                        </li>
                        <li class="slide">
                            {{-- <a href="{{ route('admin.users.index') }}" class="side-menu__item">
                                Users Manage
                            </a> --}}
                        </li>
                    </ul>
                </li>


                <!-- Settings -->
                <li class="slide">
                    <a href="{{ route('admin.setting.index') }}" class="side-menu__item {{ Request::is('admin/setting*') ? 'active' : '' }}">
                        <i class="bx bxs-cog side-menu__icon"></i>
                        <span class="side-menu__label">Settings</span>
                    </a>
                </li>
                <li class="slide">
                    <a href="{{ route('admin.settings.seo.index') }}" class="side-menu__item {{ Request::is('admin/settings/seo') ? 'active' : '' }}">
                        <i class="bx bxs-cog side-menu__icon"></i>
                        <span class="side-menu__label">SEO Settings</span>
                    </a>
                </li>

            </ul>
            <div class="slide-right" id="slide-right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg>
            </div>
        </nav>
        <!-- End::nav -->

    </div>
    <!-- End::main-sidebar -->

</aside>
