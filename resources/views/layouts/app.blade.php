<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <title>{{ $metaTag['title'] }}</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="{{ $metaTag['title'] }}" />
        <meta name="description" content="{{ $metaTag['description'] }}">
        <meta name="author" content="{{ $metaTag['url'] }}">
        <meta name="title" content="{{ $metaTag['title'] }}">

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset($metaTag['favicon']) }}" type="image/x-icon" />
        <link rel="icon" href="{{ asset($metaTag['favicon']) }}" type="image/x-icon" />
        <link rel="apple-touch-icon" href="{{ asset($metaTag['apple_touch']) }}">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

        <!-- Begin::Social Media Tag -->
        <!-- Twitter Card data -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $metaTag['title'] }}">
        <meta name="twitter:description" content="{{ $metaTag['description'] }}">
        <!-- Twitter summary card with large image must be at least 280x150px -->
        <meta name="twitter:image" content="{{ asset($metaTag['image']) }}">
        <!-- Open Graph data -->
        <meta property="og:title" content="{{ $metaTag['title'] }}" />
        <meta property="og:type" content="website" />
        <meta property="og:locale" content="en_US" />
        <meta property="og:url" content="{{ $metaTag['url'] }}" />
        <meta property="og:image" content="{{ asset($metaTag['image']) }}" />
        <meta property="og:description" content="{{ $metaTag['description'] }}" />
        <meta property="og:site_name" content="{{ $metaTag['title'] }}" />
        <meta property="og:updated_time" content="{{ $metaTag['time'] }}" />
        <meta property="article:published_time" content="{{ $metaTag['time'] }}" />
        <meta property="article:modified_time" content="{{ $metaTag['time'] }}" />
        <meta property="article:section" content="{{ $metaTag['section'] }}" />
        <meta property="article:tag" content="{{ $metaTag['tag'] }}" />
        <!-- End::Social Media Tag -->

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="base_url" content="{{ url('/') }}">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ asset('front/vendor/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('front/vendor/fontawesome-free/css/all.min.css') }}">
		<link rel="stylesheet" href="{{ asset('front/vendor/animate/animate.compat.css') }}">
		<link rel="stylesheet" href="{{ asset('front/vendor/simple-line-icons/css/simple-line-icons.min.css') }}">
		<link rel="stylesheet" href="{{ asset('front/vendor/owl.carousel/assets/owl.carousel.min.css') }}">
		<link rel="stylesheet" href="{{ asset('front/vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
		<link rel="stylesheet" href="{{ asset('front/vendor/magnific-popup/magnific-popup.min.css') }}">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{ asset('front/css/theme.css') }}">
		<link rel="stylesheet" href="{{ asset('front/css/theme-elements.css') }}">
		<link rel="stylesheet" href="{{ asset('front/css/theme-blog.css') }}">
		<link rel="stylesheet" href="{{ asset('front/css/theme-shop.css') }}">

		<!-- Skin CSS -->
		<link id="skinCSS" rel="stylesheet" href="{{ asset('front/css/skins/default.css') }}">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{ asset('front/css/custom.css') }}">

		<!-- Head Libs -->
		<script src="{{ asset('front/vendor/modernizr/modernizr.min.js') }}"></script>

	</head>
	<body id="body" class="one-page alternative-font-5 loading-overlay-showing" data-plugin-scroll-spy data-plugin-options="{'target': '#header'}" data-loading-overlay data-plugin-options="{'hideDelay': 500, 'effect': 'default'}">
		<div class="loading-overlay">
			<div class="bounce-loader">
				<div class="bounce1"></div>
				<div class="bounce2"></div>
				<div class="bounce3"></div>
			</div>
		</div>
		<div class="body">
			<header id="header" class="header-transparent header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': false, 'stickyStartAt': 0, 'stickyHeaderContainerHeight': 70}">
				<div class="header-body border-top-0 bg-dark box-shadow-none">
					<div class="header-container container">
						<div class="header-row">
							<div class="header-column">
								<div class="header-row">
									<div class="header-logo">
										<a href="{{ url('/') }}">
											<img alt="Porto" width="200" height="150" src="{{ asset('front/img/wisata-vt-logo.png') }}">
										</a>
									</div>
								</div>
							</div>
							<div class="header-column justify-content-end">
								<div class="header-row">
									<div class="header-nav header-nav-links header-nav-dropdowns-dark header-nav-light-text order-2 order-lg-1">
										<div class="header-nav-main header-nav-main-font-lg header-nav-main-font-lg-upper-2 header-nav-main-mobile-dark header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-effect-2 header-nav-main-sub-effect-1">
											<nav class="collapse">
												<ul class="nav nav-pills" id="mainNav">
													<li class="dropdown">
														<a data-hash class="nav-link active" href="{{ route('front.welcome') }}">
															Home
														</a>
													</li>
													@if (Request::is('/'))
														<li>
															<a class="nav-link" data-hash data-hash-offset="0" data-hash-offset-lg="68" href="#services">Services</a>
														</li>
														<li>
															<a class="nav-link" data-hash data-hash-offset="0" data-hash-offset-lg="68" href="#project">Projects</a>
														</li>
														<li>
															<a class="nav-link" data-hash data-hash-offset="0" data-hash-offset-lg="68" href="#contact">Contact Us</a>
														</li>
													@endif
												</ul>
											</nav>
										</div>
										<button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
											<i class="fas fa-bars"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>

			<div role="main" class="main">
				@yield('content')
            </div>

			<footer id="footer" class="mt-0">
				<div class="footer-copyright">
					<div class="container py-2">
						<div class="row py-4">
							<div class="col d-flex align-items-center justify-content-center">
								<p><strong>WISATA VT</strong> - © Copyright 2022. All Rights Reserved.</p>
							</div>
						</div>
					</div>
				</div>
			</footer>

		</div>

		<!-- Vendor -->
		<script src="{{ asset('front/vendor/jquery/jquery.min.js') }}"></script>
		<script src="{{ asset('front/vendor/jquery.appear/jquery.appear.min.js') }}"></script>
		<script src="{{ asset('front/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
		<script src="{{ asset('front/vendor/jquery.cookie/jquery.cookie.min.js') }}"></script>
		<script src="{{ asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('front/vendor/jquery.validation/jquery.validate.min.js') }}"></script>
		<script src="{{ asset('front/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
		<script src="{{ asset('front/vendor/jquery.gmap/jquery.gmap.min.js') }}"></script>
		<script src="{{ asset('front/vendor/lazysizes/lazysizes.min.js') }}"></script>
		<script src="{{ asset('front/vendor/isotope/jquery.isotope.min.js') }}"></script>
		<script src="{{ asset('front/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
		<script src="{{ asset('front/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
		<script src="{{ asset('front/vendor/vide/jquery.vide.min.js') }}"></script>
		<script src="{{ asset('front/vendor/vivus/vivus.min.js') }}"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="{{ asset('front/js/theme.js') }}"></script>

		<script src="{{ asset('front/js/views/view.contact.js') }}"></script>

		<!-- Theme Custom -->
		<script src="{{ asset('front/js/custom.js') }}"></script>

		<!-- Theme Initialization Files -->
		<script src="{{ asset('front/js/theme.init.js') }}"></script>

	    <!-- Examples -->
		<script src="{{ asset('front/js/examples/examples.portfolio.js') }}"></script>

		<!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $metaTag['g_analytics'] }}"></script>
        <script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', '{{ $metaTag['g_analytics'] }}');
        </script>

		@yield('script')

	</body>
</html>
