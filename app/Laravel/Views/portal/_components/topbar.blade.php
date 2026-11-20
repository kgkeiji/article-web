<nav class="navbar sticky-top bg-white shadow-sm px-3 py-2">

    {{-- LEFT SECTION --}}
    <div class="d-flex align-items-center gap-2">

        {{-- Desktop Sidebar Toggle --}}
        <button class="btn btn-link text-secondary p-0 d-none d-md-inline" data-bs-toggle="collapse"
            data-bs-target="#sidebar" aria-controls="sidebar" aria-label="Toggle sidebar">
            <i class="bi bi-list fs-5"></i>
        </button>

        {{-- Mobile Sidebar Toggle --}}
        <button class="btn btn-link text-secondary p-0 d-md-none" data-bs-toggle="offcanvas"
            data-bs-target="#sidebarMobile" aria-controls="sidebarMobile" aria-label="Toggle sidebar">
            <i class="bi bi-list fs-5"></i>
        </button>

        <a class="navbar-brand mb-0 fw-semibold" href="#">
            TheArticle CMS
        </a>

        {{-- Search --}}
        <div class="input-group d-none d-md-flex ms-2" style="width: 210px;">
            <input type="search" class="form-control bg-body-tertiary border-0" placeholder="Search">

            <span class="input-group-text bg-body-tertiary border-0">
                <i class="bi bi-search text-secondary"></i>
            </span>
        </div>
    </div>

    {{-- RIGHT SECTION --}}
    <div class="d-flex align-items-center gap-2">

        <div class="dropdown">

            {{-- User Dropdown Toggle --}}
            <button class="btn btn-light bg-white border-0 d-flex align-items-center gap-2" type="button"
                id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">

                <span class="d-none d-md-inline text-secondary">
                    @auth('user')
                        {{ auth('user')->user()->name }}
                    @endauth

                </span>

                <i class="bi bi-chevron-down text-secondary small"></i>
                <i class="bi bi-person-circle text-primary fs-2"></i>
            </button>

            {{-- Dropdown Menu --}}
            <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 mt-2 p-2" aria-labelledby="navbarDropdown"
                style="min-width: 200px;">

                {{-- Logout --}}
                <li>
                    <a href="{{ route('portal.logout') }}" id="logoutBtn"
                        class="dropdown-item text-danger rounded d-flex align-items-center gap-2 py-2">

                        <i class="bi bi-box-arrow-right"></i>
                        Logout
                    </a>
                </li>

            </ul>
        </div>

    </div>
</nav>
