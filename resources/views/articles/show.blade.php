<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="megakit,business,company,agency,multipurpose,modern,bootstrap4">

	<meta name="author" content="gameverse.com">

	<title>{{Str::title($article->title)}} | Game Verse</title>

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
				<a class="navbar-brand" href="{{url('/')}}">
					Game<span>Verse</span>
				</a>

				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
					<span class="fa fa-bars"></span>
				</button>

				<div class="collapse navbar-collapse text-center" id="navbarsExample09">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
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

		<section class="section blog-wrap bg-gray">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<div class="row">
							<div class="col-lg-12 mb-5">
								<div class="single-blog-item">
									@if ($article->cover && Storage::disk('public')->exists($article->cover))
									<img src="{{Storage::url($article->cover)}}" alt="" class="img-fluid rounded">
									@else
									<img src="https://via.placeholder.com/640x480.png/00aa11?text=No+Image" alt="" class="img-fluid rounded">
									@endif

									<div class="blog-item-content bg-white p-2">
										<div class="blog-item-meta bg-gray py-1 px-2">
											<span class="text-black text-capitalize mr-3">
												<i class="ti-time mr-1"></i>
												{{$article->created_at->format('d M Y')}}
											</span>
										</div>

										<h2 class="mt-3 mb-4">{{Str::title($article->title)}}</h2>
										<p class="lead mb-4">
											{!! $article->body !!}
										</p>

										<div class="tag-option mt-5 clearfix">
											<ul class="float-left list-inline">
												<li>Categories:</li>
												@foreach ($article->categories as $category)
												<li class="list-inline-item">
													<span class="badge badge-pill badge-primary">{{$category->name}}</span>
												</li>
												@endforeach
											</ul>

											<ul class="float-right list-inline">
												<li class="list-inline-item"> Share: </li>
												<li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
												<li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
												<li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
												<li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
					<div class="col-lg-4">
						<div class="sidebar-wrap">
							<div class="sidebar-widget latest-post card border-0 p-4 mb-3">
								<h5>Latest Posts</h5>

								@foreach ($latestArticles as $item)
								<div class="media border-bottom py-3">
									<a href="{{route('articles.show', $item->id)}}">
										@if ($item->cover && Storage::disk('public')->exists($item->cover))
										<img src="{{Storage::url($item->cover)}}" alt="" class="mr-4" width="80">
										@else
										<img src="https://via.placeholder.com/640x480.png/00aa11?text=No+Image" alt="" class="mr-4" width="80">
										@endif
									</a>
									<div class="media-body">
										<h6 class="my-2"><a href="{{route('articles.show', $item->id)}}">{{Str::title($item->title)}}</a></h6>
										<span class="text-sm text-muted">{{$item->created_at->format('d M Y')}}</span>
									</div>
								</div>
								@endforeach

							</div>

						</div>
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
						<h6><a href="tel:+23-345-67890">Support@hello.com</a></h6>
						<a href="mailto:support@gmail.com"><span class="text-color h4">+23-456-6588</span></a>
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
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>

	<script src="{{ asset('assets/js/script.js') }}"></script>

</body>

</html>