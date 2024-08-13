<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Shop &mdash; Free Website Template, Free HTML5 Template by gettemplates.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords"
		content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />



	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content="" />
	<meta property="og:image" content="" />
	<meta property="og:url" content="" />
	<meta property="og:site_name" content="" />
	<meta property="og:description" content="" />
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i" rel="stylesheet"> -->

	<!-- Animate.css -->
	<link rel="stylesheet" href="{{ asset('assret/css/animate.css')}}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{asset('assret/css/icomoon.css')}}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{asset('assret/css/bootstrap.css')}}">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="{{asset('assret/css/flexslider.css')}}">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="{{asset('assret/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('assret/css/owl.theme.default.min.css')}}">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{asset('assret/css/style.css')}}">

	<!-- Modernizr JS -->
	<script src="{{asset('assret/js/modernizr-2.6.2.min.js')}}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<style>
		.option-menu ul {
			display: flex;
			justify-content: space-between;
			padding: 15px;
			border-bottom: 1px solid #d8d6d6;
			margin-bottom: 30px;
			list-style: none;
		}
		.option-menu ul li a {
			color: #777;
            font-size: 20px;
            transition: color 0.3s ease;
			text-align: none;
		}
	</style>


</head>

<body>

	<div class="fh5co-loader"></div>

	<div id="page">
		@include('users.layouts.header')
		@yield('content')
		<!-- end san pham -->
		<div id="fh5co-counter" class="fh5co-bg fh5co-counter"
			style="background-image:url({{asset('assret/images/img_bg_5.jpg')}});">
			<div class="container">
				<div class="row">
					<div class="display-t">
						<div class="display-tc">
							<div class="col-md-3 col-sm-6 animate-box">
								<div class="feature-center">
									<span class="icon">
										<i class="icon-eye"></i>
									</span>

									<span class="counter js-counter" data-from="0" data-to="22070" data-speed="5000"
										data-refresh-interval="50">1</span>
									<span class="counter-label">Creativity Fuel</span>

								</div>
							</div>
							<div class="col-md-3 col-sm-6 animate-box">
								<div class="feature-center">
									<span class="icon">
										<i class="icon-shopping-cart"></i>
									</span>

									<span class="counter js-counter" data-from="0" data-to="450" data-speed="5000"
										data-refresh-interval="50">1</span>
									<span class="counter-label">Happy Clients</span>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 animate-box">
								<div class="feature-center">
									<span class="icon">
										<i class="icon-shop"></i>
									</span>
									<span class="counter js-counter" data-from="0" data-to="700" data-speed="5000"
										data-refresh-interval="50">1</span>
									<span class="counter-label">All Products</span>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 animate-box">
								<div class="feature-center">
									<span class="icon">
										<i class="icon-clock"></i>
									</span>

									<span class="counter js-counter" data-from="0" data-to="5605" data-speed="5000"
										data-refresh-interval="50">1</span>
									<span class="counter-label">Hours Spent</span>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="fh5co-started">
			<div class="container">
				<div class="row animate-box">
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
						<h2>Newsletter</h2>
						<p>Just stay tune for our latest Product. Now you can subscribe</p>
					</div>
				</div>
				<div class="row animate-box">
					<div class="col-md-8 col-md-offset-2">
						<form class="form-inline">
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label for="email" class="sr-only">Email</label>
									<input type="email" class="form-control" id="email" placeholder="Email">
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<button type="submit" class="btn btn-default btn-block">Subscribe</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		@include('users.layouts.footer')
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

	<!-- jQuery -->
	<script src="{{asset('assret/js/jquery.min.js')}}"></script>
	<!-- jQuery Easing -->
	<script src="{{asset('assret/js/jquery.easing.1.3.js')}}"></script>
	<!-- Bootstrap -->
	<script src="{{asset('assret/js/bootstrap.min.js')}}"></script>

	<!-- Waypoints -->
	<script src="{{asset('assret/js/jquery.waypoints.min.js')}}"></script>
	<!-- Carousel -->
	<script src="{{asset('assret/js/owl.carousel.min.js')}}"></script>
	<!-- countTo -->
	<script src="{{asset('assret/js/jquery.countTo.js')}}"></script>
	<!-- Flexslider -->
	<script src="{{asset('assret/js/jquery.flexslider-min.js')}}"></script>
	<!-- Main -->
	<script src="{{asset('assret/js/main.js')}}"></script>
	@stack('script')
</body>

</html>