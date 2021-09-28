<div class="fixed-top">

    <div class="container-fluid py-2 top-nav" style="background-color: #DFDFDF;">
        <div class="container">
            <div class="row justify-content-sm-start justify-content-lg-end">
                <div class="col-12 text-center col-lg-3 text-lg-end">
                    <p><i class="bi bi-envelope-fill me-2"></i>info@parisprivatetransfer.com</p>
                </div>

                <div class="col-12 text-center col-lg-2 text-lg-end">
                    <p><i class="bi bi-telephone-fill me-2"></i></i>0033652300255</p>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg bg-light navbar-light p-0 bottom-nav">
        <div class="container position-relative">
            <a class="navbar-brand" href="{{ route('frontend.index') }}">
                <img src="{{ url('img/logo.png') }}" alt="" class="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto py-4 align-items-center">
                    <li class="nav-item links mb-1 mb-md-0">
                        <a class="nav-link text-decoration-none text-dark p-0 {{ Request::segment(1) == null ? 'active' : null }}" aria-current="page" href="{{ route('frontend.index') }}">HOME</a>
                    </li>
                    <li class="nav-item links mb-1 mb-md-0">
                        <a class="nav-link text-decoration-none text-dark p-0 {{ Request::segment(1) == 'rates' ? 'active' : null }}" href="{{ route('frontend.rates') }}">RATES</a>
                    </li>
                    <li class="nav-item links mb-1 mb-md-0">
                        <a class="nav-link text-decoration-none text-dark p-0 {{ Request::segment(1) == 'online-booking' ? 'active' : null }}" href="{{ route('frontend.booking') }}">ONLINE BOOKING</a>
                    </li>
                    <li class="nav-item links mb-3 mb-md-0">
                        <a class="nav-link text-decoration-none text-dark p-0 {{ Request::segment(1) == 'contact-us' ? 'active' : null }}" href="{{ route('frontend.contact_us') }}">CONTACT</a>
                    </li>
                    @auth
                    <li class="nav-item ps-0 ps-md-3">
                        <a class="nav-link text-decoration-none text-white btn rounded-pill px-4" href="{{ route('frontend.auth.logout') }}" style="background-color: #FF9701">Logout</a>
                    </li>
                    @else                    
                    <li class="nav-item px-0 ps-md-4 pe-md-3 mb-3 mb-md-0">
                        <a class="nav-link text-decoration-none text-dark btn rounded-pill px-4" href="{{ route('frontend.auth.register') }}" style="border: 1px solid #FF9701;">Sign Up</a>
                    </li>
                    <li class="nav-item ps-0 ps-md-3">
                        <a class="nav-link text-decoration-none text-white btn rounded-pill px-4" href="{{ route('frontend.auth.login') }}" style="background-color: #FF9701">Log In</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

</div>






