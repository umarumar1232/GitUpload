<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="megakit,business,company,agency,multipurpose,modern,bootstrap4">

    <meta name="author" content="gameverse.com">

    <title>Game Verse</title>

    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <!-- Icon Font Css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/themify/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/magnific-popup/dist/magnific-popup.css') }}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/slick-carousel/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/slick-carousel/slick/slick-theme.css') }}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>
    <!-- Header Start -->
    <header class="navigation">
        <nav class="navbar navbar-expand-lg  py-4" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    Game<span>Verse</span>
                </a>

                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                    data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span>
                </button>

                <div class="collapse navbar-collapse text-center" id="navbarsExample09">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/') }}">Home <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        @if (!Auth::check() && Route::has('register'))
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @endif
                    </ul>

                    @auth
                        <div class="form-lg-inline my-2 my-md-0 ml-lg-4 text-center">
                            @role('admin')
                                <a href="{{ url('/dashboard') }}" class="btn btn-solid-border btn-round-full">Dashboard</a>
                            @else
                                <a href="{{ url('/list-articles') }}" class="btn btn-solid-border btn-round-full">Dashboard</a>
                            @endrole
                        @else
                        </div>
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="btn btn-solid-border btn-round-full">Log in</a>
                        @endif
                    @endauth
                </div>
            </div>
        </nav>
    </header>
    <!-- Header Close -->

    <div class="main-wrapper ">
        <section class="page-title bg-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block text-center">
                            <h1 class="text-capitalize mb-4 text-lg">Game Verse </h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section blog-wrap bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            @foreach ($articles as $article)
                                <div class="col-lg-6 col-md-6 mb-5">
                                    <div class="blog-item">
                                        @if ($article->cover && Storage::disk('public')->exists($article->cover))
                                            <img src="{{ Storage::url($article->cover) }}" alt=""
                                                class="img-fluid rounded">
                                        @else
                                            <img src="https://via.placeholder.com/780x510.png/00aa11?text=No+Image"
                                                alt="" class="img-fluid rounded">
                                        @endif

                                        <div class="blog-item-content bg-white p-4">
                                            <h3 class="mt-3 mb-3"><a
                                                    href="{{ route('articles.show', $article->id) }}">{{ Str::title($article->title) }}</a>
                                            </h3>
                                            <p class="mb-4">{{ Str::limit(strip_tags($article->body), 100) }}</p>

                                            <a href="{{ route('articles.show', $article->id) }}"
                                                class="btn btn-small btn-main btn-round-full">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebar-wrap">

                            <div class="sidebar-widget bg-white rounded tags p-4 mb-3">
                                <h5 class="mb-4">Categories</h5>

                                @foreach ($categories as $category)
                                    <a href="#">{{ $category->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-lg-8">
                        {{ $articles->onEachSide(5)->links() }}
                    </div>
                </div>
            </div>
        </section>
    </div>


    <!-- footer Start -->
    <footer class="footer section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="widget">
                        <h4 class="text-capitalize mb-4">Company</h4>

                        <ul class="list-unstyled footer-menu lh-35">
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="widget">
                        <h4 class="text-capitalize mb-4">Quick Links</h4>

                        <ul class="list-unstyled footer-menu lh-35">
                            <li><a href="#">About</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="widget">
                        <h4 class="text-capitalize mb-4">Subscribe Us</h4>
                        <p>Subscribe to get latest news article and resources </p>

                        <form action="#" class="sub-form">
                            <input type="text" class="form-control mb-3" placeholder="Subscribe Now ...">
                            <a href="#" class="btn btn-main btn-small">subscribe</a>
                        </form>
                    </div>
                </div>

                <div class="col-lg-3 ml-auto col-sm-6">
                    <div class="widget">
                        <div class="logo mb-4">
                            <h3>Game<span>Verse</span></h3>
                        </div>
                        <h6><a href="mailto:umar.baikhati1@gmail.com">umar.baikhati1@gmail.com</a></h6>
                        <a href="tel:+821-7029-0198"><span class="text-color h4">+821-7029-0198</span></a>
                    </div>
                </div>
            </div>

        </div>
    </footer>

    <!--
    Essential Scripts
    =====================================-->


    <!-- Main jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/contact.js') }}"></script>
    <!-- Bootstrap 4.3.1 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--  Magnific Popup-->
    <script src="{{ asset('assets/plugins/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
    <!-- Slick Slider -->
    <script src="{{ asset('assets/plugins/slick-carousel/slick/slick.min.js') }}"></script>
    <!-- Counterup -->
    <script src="{{ asset('assets/plugins/counterup/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counterup/jquery.counterup.min.js') }}"></script>

    <!-- Google Map -->
    <script src="{{ asset('assets/plugins/google-map/map.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap">
    </script>

    <script src="{{ asset('assets/js/script.js') }}"></script>

</body>

</html>
