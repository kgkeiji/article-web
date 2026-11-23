<div id="sidebar" class="collapse collapse-horizontal show">
    <aside class="bg-white border-end h-100 d-flex flex-column">

        {{-- BRAND HEADER --}}
        <div class="px-4 py-4 border-bottom">
            <div class="d-flex align-items-center gap-3">
                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="TheArticle CMS Logo" class="sidebar-logo"
                    width="40" height="40">

                <div class="lh-sm">
                    <div class="fw-bold">TheArticle CMS</div>
                    <small class="text-body-secondary">Content Management</small>
                </div>
            </div>
        </div>

        {{-- NAVIGATION --}}
        <div class="flex-grow-1 overflow-y-auto px-3 py-4">

            {{-- BACKOFFICE --}}
            <div class="small fw-bold text-uppercase text-body-secondary px-3 mb-2">
                BackOffice
            </div>

            <ul class="nav flex-column gap-1">

                <li class="nav-item">
                    <a href="{{ route('backoffice.dashboard') }}"
                        class="nav-link d-flex align-items-center gap-3 rounded-3 px-3 py-2">
                        <i class="bi bi-grid-1x2 fs-5"></i>
                        <span class="small fw-medium">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('backoffice.profile.index') }}"
                        class="nav-link d-flex align-items-center gap-3 rounded-3 px-3 py-2">
                        <i class="bi bi-person-circle fs-5"></i>
                        <span class="small fw-medium">Profile</span>
                    </a>
                </li>

                {{-- ACCOUNT MANAGEMENT --}}
                <li class="nav-item mt-3">
                    <div class="small fw-bold text-uppercase text-body-secondary px-3 mb-2">
                        User Management
                    </div>

                    <ul class="nav flex-column gap-1">

                        <li>
                            <a href="{{ route('backoffice.account-management.index') }}"
                                class="nav-link d-flex align-items-center gap-3 rounded-3 px-3 py-2">
                                <i class="bi bi-shield-lock fs-5"></i>
                                <span class="small fw-medium">Admin Accounts</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('backoffice.account-management.index-portal') }}"
                                class="nav-link d-flex align-items-center gap-3 rounded-3 px-3 py-2">
                                <i class="bi bi-people fs-5"></i>
                                <span class="small fw-medium">User Accounts</span>
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- PAGE MANAGEMENT --}}
                <li class="nav-item mt-3">
                    <div class="small fw-bold text-uppercase text-body-secondary px-3 mb-2">
                        Page Management
                    </div>

                    <ul class="nav flex-column gap-1">

                        <li>
                            <a href="{{ route('backoffice.home') }}"
                                class="nav-link d-flex align-items-center gap-3 rounded-3 px-3 py-2">
                                <i class="bi bi-house-door fs-5"></i>
                                <span class="small fw-medium">Home Page</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('backoffice.about') }}"
                                class="nav-link d-flex align-items-center gap-3 rounded-3 px-3 py-2">
                                <i class="bi bi-info-circle fs-5"></i>
                                <span class="small fw-medium">About Page</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('backoffice.contact') }}"
                                class="nav-link d-flex align-items-center gap-3 rounded-3 px-3 py-2">
                                <i class="bi bi-envelope fs-5"></i>
                                <span class="small fw-medium">Contact Page</span>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
        </div>


    </aside>
</div>

<div id="sidebarMobile" class="offcanvas offcanvas-start d-md-none border-0" tabindex="-1"
    aria-labelledby="sidebarMobileLabel">

    <aside class="offcanvas-body bg-white h-100 p-0 d-flex flex-column">

        {{-- BRAND HEADER --}}
        <div class="px-4 py-4 border-bottom">
            <div class="d-flex align-items-center justify-content-between">

                <div class="d-flex align-items-center gap-3">
                    <img src="{{ asset('assets/images/logo-dark.png') }}" alt="TheArticle CMS Logo" class="sidebar-logo"
                        width="40" height="40">

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
                BackOffice
            </div>

            <ul class="nav flex-column gap-1">

                <li>
                    <a href="{{ route('backoffice.dashboard') }}"
                        class="nav-link d-flex align-items-center gap-3 rounded-3 px-3 py-2"
                        data-bs-dismiss="offcanvas">
                        <i class="bi bi-grid-1x2 fs-5"></i>
                        <span class="small fw-medium">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('backoffice.profile.index') }}"
                        class="nav-link d-flex align-items-center gap-3 rounded-3 px-3 py-2"
                        data-bs-dismiss="offcanvas">
                        <i class="bi bi-person-circle fs-5"></i>
                        <span class="small fw-medium">Profile</span>
                    </a>
                </li>

                {{-- USER MANAGEMENT --}}
                <li class="mt-3">
                    <div class="small fw-bold text-uppercase text-body-secondary px-3 mb-2">
                        User Management
                    </div>

                    <ul class="nav flex-column gap-1">

                        <li>
                            <a href="{{ route('backoffice.account-management.index') }}"
                                class="nav-link d-flex align-items-center gap-3 rounded-3 px-3 py-2"
                                data-bs-dismiss="offcanvas">
                                <i class="bi bi-shield-lock fs-5"></i>
                                <span class="small fw-medium">Admin Accounts</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('backoffice.account-management.index-portal') }}"
                                class="nav-link d-flex align-items-center gap-3 rounded-3 px-3 py-2"
                                data-bs-dismiss="offcanvas">
                                <i class="bi bi-people fs-5"></i>
                                <span class="small fw-medium">User Accounts</span>
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- PAGE MANAGEMENT --}}
                <li class="mt-3">
                    <div class="small fw-bold text-uppercase text-body-secondary px-3 mb-2">
                        Page Management
                    </div>

                    <ul class="nav flex-column gap-1">

                        <li>
                            <a href="{{ route('backoffice.home') }}"
                                class="nav-link d-flex align-items-center gap-3 rounded-3 px-3 py-2"
                                data-bs-dismiss="offcanvas">
                                <i class="bi bi-house-door fs-5"></i>
                                <span class="small fw-medium">Home Page</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('backoffice.about') }}"
                                class="nav-link d-flex align-items-center gap-3 rounded-3 px-3 py-2"
                                data-bs-dismiss="offcanvas">
                                <i class="bi bi-info-circle fs-5"></i>
                                <span class="small fw-medium">About Page</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('backoffice.contact') }}"
                                class="nav-link d-flex align-items-center gap-3 rounded-3 px-3 py-2"
                                data-bs-dismiss="offcanvas">
                                <i class="bi bi-envelope fs-5"></i>
                                <span class="small fw-medium">Contact Page</span>
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
        .sidebar-logo {
            width: 40px !important;
            height: 40px !important;
            object-fit: contain !important;
            flex-shrink: 0 !important;
        }

        /* SIDEBAR NAVIGATION */
        #sidebar .nav-link,
        #sidebarMobile .nav-link {
            color: var(--bs-secondary-color) !important;
            transition: all 0.2s ease-in-out;
        }

        #sidebar aside {
            width: 260px;
            min-width: 260px;
        }

        #sidebarMobile {
            width: 280px;
        }

        #sidebar .nav-link:hover,
        #sidebarMobile .nav-link:hover {
            background-color: var(--bs-primary-bg-subtle);
            color: var(--bs-primary) !important;
        }

        #sidebar .nav-link.active,
        #sidebarMobile .nav-link.active {
            background-color: var(--bs-primary);
            color: #fff !important;
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

        /* SIDEBAR SCROLLBAR */
        #sidebar aside,
        #sidebarMobile aside {
            min-height: 100%;
        }

        /* MOBILE OFFCANVAS */
        #sidebarMobile {
            --bs-offcanvas-width: 280px;
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
