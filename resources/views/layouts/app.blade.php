{{ set_basket_cookie() }}

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css"
        integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    @yield('style')
    <title>Hudders Market</title>
</head>

<body class="bg-light">

    <!-- Header -->
    <!-- Link Bar -->
    <div class="container-fluid bg-light-dark py-1">
        <div class="container">
            <div class="row">
                <div class="ml-auto col-lg-6 text-right">
                    @guest
                    <a class="link-dark mr-3" href="{{ route('register.trader') }}">Become a Trader</a>
                    <a class="link-dark mr-3" href="{{ route('login') }}">Login</a>
                    <a class="link-dark" href="{{ route('register') }}">Register</a>
                    @endguest

                    @auth
                    <a class="link-dark ml-3" href="{{ route('accounts.index') }}">My Account</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
    <!-- End of Link Bar -->

    <!-- Navigation Bar -->
    <div class="container-fluid bg-white py-2">
        <div class="container d-flex align-items-center">
            <a href="{{ url('') }}">
                <img height="50" src="{{ asset('assets/images/logo.png') }}" alt="Hudders Market Logo">
            </a>

            <form action="{{ route('search') }}" class="input-group ml-3 ml-lg-5">
                <input type="text" name="q" value="{{ $search ?? '' }}"
                    class="form-control border-2 border-primary shadow-none" placeholder="Search in Hudders Market">
                <div class="input-group-append">
                    <button class="btn btn-primary prepend-text">
                        <img class="text-white" width="20" src="{{ asset('assets/images/search.svg') }}" alt="Search">
                    </button>
                </div>
            </form>

            <a href="{{ route('baskets.index') }}" class="link-dark d-flex align-items-center lg-max-hide ml-5">
                <i class="cart fas fa-shopping-cart"></i>
                <span class="ml-1">Basket</span>
                <span class="badge badge-primary mb-4 border-circle rounded-circle">{{ get_basket_quantity() }}</span>
            </a>
        </div>
    </div>
    <!-- End of Navigation Bar -->

    <!-- Sub Navigation Bar -->
    <div class="container-fluid py-2 bg-info lg-max-hide">
        <div class="container">
            @foreach (productTypes() as $productType)
            <a class="link-white mr-3"
                href="{{ route('search', ['product_type' => $productType->id]) }}">{{ $productType->name }}</a>
            @endforeach
        </div>
    </div>
    <!-- End of Sub Navigation bar -->
    <!-- End of Header -->

    <!-- Content -->

    @yield('content')

    <!-- End of Content -->

    <!-- Footer -->

    <div class="bg-dark mt-5 py-4">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-2 mb-lg-0 col-md-4 d-flex align-items-center">
                    <a href="{{ url('/') }}">
                        <img width="250" class="img-fluid" src="{{ asset('assets/images/logo-white.png') }}"
                            alt="Hudders Market Logo">
                    </a>
                </div>

                <div class="col-12 my-4 my-lg-0 col-md-4">
                    <div>
                        <h5 class="text-white bold">Quick Links</h5>
                        <a class="d-block link-footer" href="{{ route('about') }}">About Us</a>
                        <a class="d-block link-footer" href="{{route('search') }}">Navigate Products</a>
                        <a class="d-block link-footer" href="{{ route('contact') }}">Customer Support</a>
                    </div>
                </div>

                <div class="col-12 mt-2 mt-lg-0 col-md-4">
                    <h5 class=" text-white bold">Contact Us</h5>
                    <a class="d-block link-footer" href="#">Call: 1234567890</a>
                    <a class="d-block link-footer" href="mailto:huddersmarket@gmail.com">
                        Email: huddersmarket@gmail.com</a>
                    <div class="d-flex mt-2">
                        <a target="_blank" href="https://facebook.com">
                            <img width="25" class="mr-2" src="{{ asset('assets/images/facebook.png') }}"
                                alt="Facebook Logo">
                        </a>
                        <a target="_blank" href="https://instagram.com">
                            <img width="25" class="mr-2" src="{{ asset('assets/images/instagram.png') }}"
                                alt="Instagram Logo">
                        </a>
                        <a target="_blank" href="https://twitter.com">
                            <img width="25" class="mr-2" src="{{ asset('assets/images/twitter.png') }}"
                                alt="Twitter Logo">
                        </a>
                        <a target="_blank" href="https://linkedin.com">
                            <img width="25" class="mr-2" src="{{ asset('assets/images/linkedin.png') }}"
                                alt="Linked In Logo">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p class="bg-primary text-white text-center py-2 mb-0">Hudders Market © 2021 | All Rights Reserved.</p>

    <!-- Sticky Mobile Menu -->
    <div class="container-fluid bg-white border py-2 fixed-bottom position-sticky lg-hide">
        <div class="row">

            <div class="col-3">
                <a class="link-text" href="{{ url('') }}">
                    <div class="text-center footer-menu-item">
                        <i class="fas fa-home"></i>
                        <p class="my-0">Home</p>
                    </div>
                </a>
            </div>
            <div class="col-3">
                <a class="link-text" href="#">
                    <div class="text-center footer-menu-item">
                        <i class="fas fa-th"></i>
                        <p class="my-0">Types</p>
                    </div>
                </a>
            </div>
            <div class="col-3">
                <a class="link-text" href="{{ route('baskets.index') }}">
                    <div class="text-center footer-menu-item">
                        <i class="fas fa-shopping-cart"></i>
                        <p class="my-0">Basket</p>
                    </div>
                </a>
            </div>
            <div class="col-3">
                <a class="link-text" href="{{ route('accounts.index') }}">
                    <div class="text-center footer-menu-item">
                        <i class="fas fa-user-circle"></i>
                        <p class="my-0">Account</p>
                    </div>
                </a>
            </div>

        </div>
    </div>
    <!-- End of Sticky Mobile Menu -->
    <!-- End of Footer -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
        integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/script/main.js') }}"></script>
    @yield('script')
</body>

</html>
