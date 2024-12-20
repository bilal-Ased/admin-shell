<!-- Horizontal Menu Start -->
<nav id="navbar_main" class="nav navbar navbar-expand-xl hover-nav horizontal-nav mobile-offcanvas ">
    <div class="container-fluid p-lg-0">
        <div class="offcanvas-header px-0">
            <div class="navbar-brand ms-3">
                <svg class="icon-30 text-primary" width="30" viewBox="0 0 30 30" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2"
                        transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"></rect>
                    <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)"
                        fill="currentColor"></rect>
                    <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)"
                        fill="currentColor"></rect>
                    <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2"
                        transform="rotate(45 10.5562 -0.556152)" fill="currentColor"></rect>
                </svg>
                <h5 class="logo-title">{{ env('APP_NAME') }}</h5>
            </div>
            <button class="btn-close float-end px-3"></button>
        </div>
        <ul class="navbar-nav iq-nav-menu  list-unstyled" id="header-menu">
            <li class="nav-item ">
                <a class="nav-link menu-arrow justify-content-start" data-bs-toggle="collapse" href="#homeData"
                    role="button" aria-expanded="false" aria-controls="homeData">
                    <span class="item-name">Home</span>
                </a>

            </li>
            <li class="nav-item"><a class="nav-link {{ activeRoute(route('landing-pages.about')) }}"
                    href="{{ route('landing-pages.about') }}">About Us</a></li>
            <li class="nav-item"><a class="nav-link {{ activeRoute(route('landing-pages.pricing')) }}"
                    href="{{ route('landing-pages.pricing') }}">Pricing</a></li>
            <li class="nav-item d-xl-none"><a class="nav-link {{ activeRoute(route('landing-pages.blog')) }}"
                    href="{{ route('landing-pages.blog') }}">Blog</a></li>
            <li class="nav-item d-xl-none"><a class="nav-link {{ activeRoute(route('landing-pages.faq')) }}"
                    href="{{ route('landing-pages.faq') }}">Faq</a></li>

        </ul>
    </div> <!-- container-fluid.// -->
</nav>
<!-- Sidebar Menu End -->