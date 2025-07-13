<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>
            {{ env('APP_NAME') }} | @yield('title')
        </title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
            rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{ asset('landing/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('landing/lib/owlcarousel/assets/owl.carousel.css') }}" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('landing/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('landing/css/style.css') }}" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner"
            class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar start -->
        <div class="container-fluid fixed-top">
            <div class="container topbar bg-primary d-none d-lg-block">
                <div class="d-flex justify-content-between">
                    <div class="top-info ps-2">
                        <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a
                                href="#" class="text-white">123 Street, New York</a></small>
                        <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#"
                                class="text-white">Email@Example.com</a></small>
                    </div>
                </div>
            </div>
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                    <a href="{{ url('/') }}" class="navbar-brand">
                        <h1 class="text-primary display-6">{{ env('APP_NAME') }}</h1>
                    </a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        @include('frontend.layouts.menu')
                        <div class="d-flex align-items-center m-3 me-0 gap-3">
                            <!-- Cart Icon -->
                            <a href="{{ route('myCart') }}" class="position-relative">
                                <i class="fa fa-shopping-bag fa-2x"></i>
                                @auth
                                    @php
                                        $cartCount = App\Models\CartItem::where('user_id', Auth::id())->count();
                                    @endphp
                                    <span
                                        class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark"
                                        style="top: -5px; left: 15px; height: 20px; min-width: 20px; font-size: 0.8rem;">
                                        {{ $cartCount }}
                                    </span>
                                @endauth
                            </a>

                            <!-- Order Icon -->
                            <a href="{{ route('myorder') }}">
                                <i class="fas fa-user fa-2x"></i>
                            </a>

                            <!-- Logout Icon -->
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                                <i class="fas fa-sign-out-alt fa-2x"></i>
                            </a>
                        </div>

                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->
        @yield('content')


        @include('frontend.layouts.footer')
        @include('frontend.layouts.copyright')




        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i
                class="fa fa-arrow-up"></i></a>

        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('landing/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('landing/lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('landing/lib/lightbox/js/lightbox.min.js') }}"></script>
        <script src="{{ asset('landing/lib/owlcarousel/owl.carousel.min.js') }}"></script>

        <!-- Template Javascript -->
        <script src="{{ asset('landing/js/main.js') }}"></script>
    </body>

</html>
