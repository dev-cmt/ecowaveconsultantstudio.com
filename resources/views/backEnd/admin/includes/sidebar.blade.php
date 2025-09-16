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

                <!-- Dashboard - Always visible -->
                <li class="slide">
                    <a href="{{ route('dashboard') }}"
                        class="side-menu__item {{ Request::is('admin') ? 'active' : '' }}">
                        <i class="bx bxs-dashboard side-menu__icon"></i>
                        <span class="side-menu__label">Dashboard</span>
                    </a>
                </li>

                <!-- Category -->
                @can('view categories')
                <li class="slide">
                    <a href="{{ route('admin.categories.index') }}"
                        class="side-menu__item {{ Request::is('admin/categories*') ? 'active' : '' }}">
                        <i class="bx bx-layer side-menu__icon"></i>
                        <span class="side-menu__label">Category</span>
                    </a>
                </li>
                @endcan

                <!-- Feature -->
                @can('view features')
                <li class="slide">
                    <a href="{{ route('admin.features.index') }}"
                        class="side-menu__item {{ Request::is('admin/features*') ? 'active' : '' }}">
                        <i class="bx bx-task side-menu__icon"></i>
                        <span class="side-menu__label">Feature</span>
                    </a>
                </li>
                @endcan

                <!-- Tags -->
                @can('view tags')
                <li class="slide">
                    <a href="{{ route('admin.tags.index') }}"
                        class="side-menu__item {{ Request::is('admin/tags*') ? 'active' : '' }}">
                        <i class="bx bx-purchase-tag-alt side-menu__icon"></i>
                        <span class="side-menu__label">Tags</span>
                    </a>
                </li>
                @endcan

                <!-- Services -->
                @can('view services')
                <li class="slide">
                    <a href="{{ route('admin.services.index') }}"
                        class="side-menu__item {{ Request::is('admin/services*') ? 'active  ' : '' }}">
                        <i class="bx bx-cog side-menu__icon"></i>
                        <span class="side-menu__label">Services</span>
                    </a>
                </li>
                @endcan

                <!-- Testimonial -->
                @can('view testimonials')
                <li class="slide">
                    <a href="{{ route('admin.testimonials.index') }}"
                        class="side-menu__item {{ Request::is('admin/testimonials*') ? 'active' : '' }}">
                        <i class="bx bx-comment-detail side-menu__icon"></i>
                        <span class="side-menu__label">Testimonial</span>
                    </a>
                </li>
                @endcan

                <!-- Story -->
                @can('view story')
                <li class="slide">
                    <a href="{{ route('admin.story.index') }}"
                        class="side-menu__item {{ Request::is('admin/story*') ? 'active' : '' }}">
                        <i class="bx bx-book side-menu__icon"></i>
                        <span class="side-menu__label">Story</span>
                    </a>
                </li>
                @endcan

                <!-- Achievement -->
                @can('view achievements')
                <li class="slide">
                    <a href="{{ route('admin.achievements.index') }}"
                        class="side-menu__item {{ Request::is('admin/achievements*') ? 'active' : '' }}">
                        <i class="bx bx-trophy side-menu__icon"></i>
                        <span class="side-menu__label">Achievement</span>
                    </a>
                </li>
                @endcan

                <!-- Project -->
                @can('view projects')
                <li class="slide">
                    <a href="{{ route('admin.projects.index') }}"
                        class="side-menu__item {{ Request::is('admin/projects*') ? 'active' : '' }}">
                        <i class="bx bx-network-chart side-menu__icon"></i>
                        <span class="side-menu__label">Project</span>
                    </a>
                </li>
                @endcan

                <!-- Team -->
                @can('view teams')
                <li class="slide">
                    <a href="{{ route('admin.team.index') }}"
                        class="side-menu__item {{ Request::is('admin/team*') ? 'active' : '' }}">
                        <i class="bx bx-group side-menu__icon"></i>
                        <span class="side-menu__label">Team</span>
                    </a>
                </li>
                @endcan

                <!-- Clients -->
                @can('view clients')
                <li class="slide">
                    <a href="{{ route('admin.clients.index') }}"
                        class="side-menu__item {{ Request::is('admin/clients*') ? 'active' : '' }}">
                        <i class="bx bx-briefcase side-menu__icon"></i>
                        <span class="side-menu__label">Clients</span>
                    </a>
                </li>
                @endcan

                <!-- Mission -->
                @can('view missions')
                <li class="slide">
                    <a href="{{ route('admin.mission.index') }}"
                        class="side-menu__item {{ Request::is('admin/mission*') ? 'active' : '' }}">
                        <i class="bx bx-flag side-menu__icon"></i>
                        <span class="side-menu__label">Mission</span>
                    </a>
                </li>
                @endcan

                <!-- Contact Information -->
                @can('view contact')
                <li class="slide">
                    <a href="{{ route('admin.contact.index') }}"
                        class="side-menu__item {{ Request::is('admin/contact*') ? 'active' : '' }}">
                        <i class="bx bx-envelope side-menu__icon"></i>
                        <span class="side-menu__label">Contact Information</span>
                    </a>
                </li>
                @endcan

                <!-- Contact Submissions -->
                @can('view contact')
                <li class="slide">
                    <a href="{{ route('admin.contact.submissions.index') }}"
                        class="side-menu__item {{ Request::is('admin/contact/submissions*') ? 'active' : '' }}">
                        <i class="bx bx-party side-menu__icon"></i>
                        <span class="side-menu__label">Contact Submissions</span>
                    </a>
                </li>
                @endcan

                <!-- Blogs -->
                @can('view blogs')
                <li class="slide">
                    <a href="{{ route('admin.blogs.index') }}"
                        class="side-menu__item {{ Request::is('admin/blogs*') ? 'active' : '' }}">
                        <i class="bx bx-news side-menu__icon"></i>
                        <span class="side-menu__label">Blogs & News</span>
                    </a>
                </li>
                @endcan

                <!-- Authentication - Only for admin -->
                @canany(['view roles', 'view users'])
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-fingerprint side-menu__icon"></i>
                        <span class="side-menu__label">Authentication</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1" data-popper-placement="bottom">
                        @can('view roles')
                        <li class="slide">
                            <a href="{{ route('admin.roles.index') }}" class="side-menu__item">
                                Role & Permission
                            </a>
                        </li>
                        @endcan
                        @can('view users')
                        <li class="slide">
                            <a href="{{ route('admin.users.index') }}" class="side-menu__item">
                                Users Manage
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany

                <!-- Settings -->
                @can('view settings')
                <li class="slide">
                    <a href="{{ route('admin.setting.index') }}" class="side-menu__item {{ Request::is('admin/setting*') ? 'active' : '' }}">
                        <i class="bx bxs-cog side-menu__icon"></i>
                        <span class="side-menu__label">Settings</span>
                    </a>
                </li>
                @endcan

                <!-- SEO Settings -->
                @can('view seo')
                <li class="slide">
                    <a href="{{ route('admin.settings.seo.index') }}" class="side-menu__item {{ Request::is('admin/settings/seo') ? 'active' : '' }}">
                        <i class="bx bx-search-alt-2 side-menu__icon"></i>
                        <span class="side-menu__label">SEO Settings</span>
                    </a>
                </li>
                @endcan

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
