<nav class="navbar navbar-expand-lg bg-transparent">
    <div class="container-fluid position-relative">
        <a class="navbar-brand fst-italic" href="{{ route('web.home') }}">TheArticle</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 position-lg-absolute start-50 translate-middle-x-lg">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('web.home') ? 'active' : '' }}"
                        @if (request()->routeIs('web.home')) aria-current="page" @endif
                        href="{{ route('web.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('web.about') ? 'active' : '' }}"
                        @if (request()->routeIs('web.about')) aria-current="page" @endif
                        href="{{ route('web.about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('web.articles') ? 'active' : '' }}"
                        @if (request()->routeIs('web.articles')) aria-current="page" @endif
                        href="{{ route('web.articles') }}">Articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('web.contact') ? 'active' : '' }}"
                        @if (request()->routeIs('web.contact')) aria-current="page" @endif
                        href="{{ route('web.contact') }}">Contact</a>
                </li>
            </ul>
            <div class="d-flex align-items-center gap-3">
                @auth('user')
                    <div class="dropdown">

                        {{-- User Dropdown Toggle --}}
                        <button class="btn btn-light bg-transparent p-0 border-0 d-flex align-items-center gap-2"
                            type="button" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">

                            <span class="d-none d-md-inline text-secondary">
                                @auth('user')
                                    {{ auth('user')->user()->name }}
                                @endauth

                            </span>

                            <i class="bi bi-chevron-down text-secondary small"></i>
                            <i class="bi bi-person-circle text-primary fs-2"></i>
                        </button>

                        {{-- Dropdown Menu --}}
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 mt-2" aria-labelledby="navbarDropdown"
                            style="min-width: 200px;">

                            {{-- Profile --}}
                            <li>
                                <a href="{{ route('portal.profile.show') }}" id="logoutBtn"
                                    class="dropdown-item text-primary rounded d-flex align-items-center gap-2 py-2">

                                    Profile
                                </a>
                            </li>

                        </ul>
                    </div>
                @else
                    <a href="{{ route('portal.auth.register') }}" class="btn btn-outline-primary">Sign Up</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
