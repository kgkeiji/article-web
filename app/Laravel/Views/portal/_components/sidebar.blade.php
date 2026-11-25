{{-- SIDEBAR (DESKTOP) --}}
<div id="sidebar" class="collapse collapse-horizontal show">
    <aside class="bg-white border-end h-100 d-flex flex-column portal-sidebar">

        {{-- BRAND HEADER --}}
        <div class="px-4 py-4 border-bottom">
            <div class="d-flex align-items-center gap-3">
                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="TheArticle CMS Logo" class="sidebar-logo"
                    width="40" height="auto">

                <div class="lh-sm">
                    <div class="fw-bold">TheArticle CMS</div>
                    <small class="text-body-secondary">Content Management</small>
                </div>
            </div>
        </div>

        {{-- NAVIGATION --}}
        <div class="flex-grow-1 overflow-y-auto px-3 py-4">

            <div class="small fw-bold text-uppercase text-body-secondary px-3 mb-2">
                Portal
            </div>

            <ul class="nav flex-column gap-1">

                {{-- PROFILE --}}
                <li class="nav-item">
                    <a href="{{ route('portal.profile.show') }}"
                        class="nav-link d-flex align-items-center gap-3 rounded-3 px-3 py-2
                        {{ request()->routeIs('portal.profile.*') ? 'active' : '' }}">
                        <i class="bi bi-person-circle fs-5"></i>
                        <span class="small fw-medium">Profile</span>
                    </a>
                </li>

                {{-- WEBSITE MANAGEMENT --}}
                <li class="nav-item mt-3">
                    <div class="small fw-bold text-uppercase text-body-secondary px-3 mb-2">
                        Website Management
                    </div>

                    <ul class="nav flex-column gap-1">
                        <li>
                            <a href="{{ route('portal.cms.home') }}"
                                class="nav-link d-flex align-items-center gap-3 rounded-3 px-3 py-2
                                {{ request()->routeIs('portal.home') ? 'active' : '' }}">
                                <i class="bi bi-house-door fs-5"></i>
                                <span class="small fw-medium">Home Page</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('portal.cms.about') }}"
                                class="nav-link d-flex align-items-center gap-3 rounded-3 px-3 py-2
                                {{ request()->routeIs('portal.about') ? 'active' : '' }}">
                                <i class="bi bi-info-circle fs-5"></i>
                                <span class="small fw-medium">About Page</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('portal.cms.contact') }}"
                                class="nav-link d-flex align-items-center gap-3 rounded-3 px-3 py-2
                                {{ request()->routeIs('portal.contact') ? 'active' : '' }}">
                                <i class="bi bi-envelope fs-5"></i>
                                <span class="small fw-medium">Contact Page</span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- CONTENT MANAGEMENT --}}
                <li class="nav-item mt-3">
                    <div class="small fw-bold text-uppercase text-body-secondary px-3 mb-2">
                        Content Management
                    </div>

                    <ul class="nav flex-column gap-1">
                        <li>
                            <a href="{{ route('portal.cms.article') }}"
                                class="nav-link d-flex align-items-center gap-3 rounded-3 px-3 py-2
                                {{ request()->routeIs('portal.articles*') ? 'active' : '' }}">
                                <i class="bi bi-newspaper fs-5"></i>
                                <span class="small fw-medium">Articles</span>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>

    </aside>
</div>

{{-- SIDEBAR (MOBILE) --}}
<div id="sidebarMobile" class="offcanvas offcanvas-start d-md-none border-0" tabindex="-1"
    aria-labelledby="sidebarMobileLabel">

    <aside class="offcanvas-body bg-white h-100 p-0 d-flex flex-column">

        {{-- BRAND HEADER --}}
        <div class="px-4 py-4 border-bottom">
            <div class="d-flex align-items-center justify-content-between">

                <div class="d-flex align-items-center gap-3">
                    <img src="{{ asset('assets/images/logo-dark.png') }}" alt="TheArticle CMS Logo"
                        class="sidebar-logo" width="40" height="auto">

                    <div class="lh-sm">
                        <div class="fw-bold" id="sidebarMobileLabel">
                            TheArticle CMS
                        </div>
                        <small class="text-body-secondary">
                            Content Management
                        </small>
                    </div>
                </div>

                <button type="button" class="btn btn-light btn-sm rounded-circle" data-bs-dismiss="offcanvas"
                    aria-label="Close sidebar">
                    <i class="bi bi-x-lg"></i>
                </button>

            </div>
        </div>

        {{-- NAVIGATION --}}
        <div class="flex-grow-1 overflow-y-auto px-3 py-4">

            <div class="small fw-bold text-uppercase text-body-secondary px-3 mb-2">
                Portal
            </div>

            <ul class="nav flex-column gap-1">

                {{-- PROFILE --}}
                <li>
                    <a href="{{ route('portal.profile.show') }}"
                        class="nav-link d-flex align-items-center gap-3 rounded-3 px-3 py-2
                        {{ request()->routeIs('portal.profile.*') ? 'active' : '' }}"
                        data-bs-dismiss="offcanvas">
                        <i class="bi bi-person-circle fs-5"></i>
                        <span class="small fw-medium">Profile</span>
                    </a>
                </li>

                {{-- WEBSITE MANAGEMENT --}}
                <li class="mt-3">
                    <div class="small fw-bold text-uppercase text-body-secondary px-3 mb-2">
                        Website Management
                    </div>

                    <ul class="nav flex-column gap-1">
                        <li>
                            <a href="{{ route('portal.cms.home') }}"
                                class="nav-link d-flex align-items-center gap-3 rounded-3 px-3 py-2
                                {{ request()->routeIs('portal.home') ? 'active' : '' }}"
                                data-bs-dismiss="offcanvas">
                                <i class="bi bi-house-door fs-5"></i>
                                <span class="small fw-medium">Home Page</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('portal.cms.about') }}"
                                class="nav-link d-flex align-items-center gap-3 rounded-3 px-3 py-2
                                {{ request()->routeIs('portal.about') ? 'active' : '' }}"
                                data-bs-dismiss="offcanvas">
                                <i class="bi bi-info-circle fs-5"></i>
                                <span class="small fw-medium">About Page</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('portal.cms.contact') }}"
                                class="nav-link d-flex align-items-center gap-3 rounded-3 px-3 py-2
                                {{ request()->routeIs('portal.contact') ? 'active' : '' }}"
                                data-bs-dismiss="offcanvas">
                                <i class="bi bi-envelope fs-5"></i>
                                <span class="small fw-medium">Contact Page</span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- CONTENT MANAGEMENT --}}
                <li class="mt-3">
                    <div class="small fw-bold text-uppercase text-body-secondary px-3 mb-2">
                        Content Management
                    </div>

                    <ul class="nav flex-column gap-1">
                        <li>
                            <a href="{{ route('portal.cms.article') }}"
                                class="nav-link d-flex align-items-center gap-3 rounded-3 px-3 py-2
                                {{ request()->routeIs('portal.articles*') ? 'active' : '' }}"
                                data-bs-dismiss="offcanvas">
                                <i class="bi bi-newspaper fs-5"></i>
                                <span class="small fw-medium">Articles</span>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>

    </aside>
</div>


@section('page-styles')
    <style>
        /* SIDEBAR DIMENSIONS */
        #sidebar .portal-sidebar {
            width: 260px;
            min-width: 260px;
        }

        #sidebarMobile {
            --bs-offcanvas-width: 280px;
        }

        /* BRAND LOGO */
        .sidebar-logo {
            width: 40px !important;
            height: 40px !important;
            object-fit: contain !important;
            flex-shrink: 0 !important;
        }

        /* BRAND HEADER */
        #sidebar .border-bottom,
        #sidebarMobile .border-bottom {
            padding: 1rem 1.25rem !important;
        }

        /* SECTION TITLES */
        .sidebar-section-title {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--bs-secondary-color);
        }

        /* NAVIGATION LINKS */
        #sidebar .nav-link,
        #sidebarMobile .nav-link {
            color: var(--bs-secondary-color);
            transition: all 0.2s ease-in-out;
        }

        #sidebar .nav-link:hover,
        #sidebarMobile .nav-link:hover {
            background-color: var(--bs-primary-bg-subtle);
            color: var(--bs-primary);
        }

        /* ACTIVE NAVIGATION */
        #sidebar .nav-link.active,
        #sidebarMobile .nav-link.active {
            background-color: var(--bs-primary);
            color: #fff;
        }

        #sidebar .nav-link.active i,
        #sidebarMobile .nav-link.active i {
            color: #fff;
        }

        /* NAVIGATION ICONS */
        #sidebar .nav-link i,
        #sidebarMobile .nav-link i {
            width: 22px;
            text-align: center;
        }

        /* SIDEBAR SCROLLING */
        #sidebar aside,
        #sidebarMobile aside {
            min-height: 100%;
        }

        #sidebarMobile .offcanvas-body {
            overflow-x: hidden;
        }
    </style>
@endsection


@section('page-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const logoutBtn = document.getElementById('logoutBtn');

            logoutBtn.addEventListener('click', function(event) {
                event.preventDefault();

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Do you want to log out?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, log out!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = logoutBtn.href;
                    }
                });
            });
        });
    </script>
@endsection
