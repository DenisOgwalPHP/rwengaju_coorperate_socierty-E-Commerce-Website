{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html> --}}
<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title>Rwengaju Coorperate Society</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

	<!-- StyleSheet -->

	<!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.min.css') }}">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
	<!-- Fancybox -->
	<link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css') }}">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('css/niceselect.css') }}">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="{{ asset('css/flex-slider.min.css') }}">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('css/owl-carousel.css') }}">
	<!-- Slicknav -->
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}">

	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="{{ asset('css/reset.css') }}">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css" integrity="sha512-f0tzWhCwVFS3WeYaofoLWkTP62ObhewQ1EZn65oSYDZUg1+CyywGKkWzm8BxaJj5HGKI72PnMH9jYyIFz+GH7g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @livewireStyles

</head>
<body class="js">

	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->


	<!-- Header -->
	<header class="header shop">
		<!-- Topbar -->
		<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-12 col-12">
						<!-- Top Left -->
						<div class="top-left">
							<ul class="list-main">
								<li><i class="ti-headphone-alt"></i> +060 (800) 801-582</li>
								<li><i class="ti-email"></i> support@shophub.com</li>
							</ul>
						</div>
						<!--/ End Top Left -->
					</div>
					<div class="col-lg-7 col-md-12 col-12">
						<!-- Top Right -->
						<div class="right-content">
							<ul class="list-main ">
								<li><i class="ti-location-pin"></i> Store location</li>
								<li><i class="ti-alarm-clock"></i> <a href="#">Daily deal</a></li>

                                @if (Route::has('login'))
                                    @auth
                                        @if (Auth::user()->utype === 'ADM')
                                        <li><i class="ti-user"></i> <a href="#">My Account {{ Auth::user()->name }}<i class="ti-angle-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="{{ route('admin.products') }}">Products</a></li>
                                                <li><a href="{{ route('admin.categories') }}">Categories</a></li>
                                                <li><a href="{{ route('admin.blogs') }}">Blogs</a></li>
                                                <li><a href="{{ route('admin.homeslider') }}">Slider</a></li>
                                                <li><a href="{{ route('admin.contact') }}">Contacts</a></li>
                                                <li><a href="{{ route('admin.coupons') }}">Coupons</a></li>
                                                <li><a href="{{ route('admin.orders') }}">Orders</a></li>
                                                <li><a href="{{ route('admin.settings') }}">Settings</a></li>
                                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                                <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                                    @csrf

                                                </form>
                                            </ul>
                                        </li>
                                        @else
                                        <li><i class="ti-user"></i> <a href="#">My Account {{ Auth::user()->name }}<i class="ti-angle-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="{{ route('user.orders') }}">Orders</a></li>
                                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                                <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                                    @csrf

                                                </form>
                                            </ul>
                                        </li>
                                        @endif

                                    @else
								    <li><i class="ti-power-off"></i><a href="{{ route('login') }}">Login</a></li>
                                    <li><i class="ti-user"></i> <a href="{{ route('register') }}">Register</a></li>
                                    @endauth

                                @endif
							</ul>
						</div>
						<!-- End Top Right -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Topbar -->
		<div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">
						<!-- Logo -->
						<div class="logo">
							<a href="/"><img src="{{ asset('images/logo.png') }}" alt="logo"></a>
						</div>
						<!--/ End Logo -->

					</div>
					@livewire('header-search-component')
					<div class="col-lg-2 col-md-3 col-12">
						<div class="right-bar">
							<!-- Search Form -->
							@livewire('wishlist-count-component')
							{{-- <div class="sinlge-bar">
								<a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
							</div> --}}
							@livewire('cart-count-component')
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Header Inner -->
		<div class="header-inner">
			<div class="container">
				<div class="cat-nav-head">
					<div class="row">
						{{-- <div class="col-lg-3">
							<div class="all-category">
								<h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>CATEGORIES</h3>
								<ul class="main-category">

									<li><a href="#">accessories</a></li>
									<li><a href="#">top 100 offer</a></li>
									<li><a href="#">sunglass</a></li>
									<li><a href="#">watch</a></li>
									<li><a href="#">man’s product</a></li>
									<li><a href="#">ladies</a></li>
									<li><a href="#">westrn dress</a></li>
									<li><a href="#">denim </a></li>
								</ul>
							</div>
						</div> --}}
						<div class="col-lg-9 col-12">
							<div class="menu-area">
								<!-- Main Menu -->

								<nav class="navbar navbar-expand-lg">
									<div class="navbar-collapse">
										<div class="nav-inner">
                                            @php
                                            $navlinks = array ( 'products' => 'Products', 'agri-inputs' => 'Agri-Inputs', 'blogs' => 'Blogs', 'contact-us' => 'Contact Us');
                                            $current_page = substr($_SERVER['REQUEST_URI'], 1);  // trim off the leading slash
                                            $current_page = str_replace('.php', '', $current_page);  // trim off the extension
                                        @endphp
											<ul class="nav main-menu menu navbar-nav">
                                                    <li class="{{ $current_page == '' ? 'active': '' }}"><a  href="/">Home</a></li>
                                                    <li class="{{ $current_page == 'products' ? 'active': '' }}"><a  href="{{ route('products') }}">Products</a></li>
                                                    <li class="{{ $current_page == 'agri-inputs' ? 'active': '' }}"><a  href="{{ route('inputs') }}">Agri-Inputs</a></li>
                                                    <li class="{{ $current_page == 'blogs' ? 'active': '' }}"><a  href="{{ route('blogs') }}">Blogs</a></li>
                                                    <li class="{{ $current_page == 'contact-us' ? 'active': '' }}"><a  href="{{ route('contact') }}">Contact Us</a></li>

													{{-- <li><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
														<ul class="dropdown">
															<li><a href="cart.html">Cart</a></li>
															<li><a href="checkout.html">Checkout</a></li>
														</ul>
													</li> --}}
													{{-- <li><a href="#">Pages</a></li> --}}

												</ul>
										</div>
									</div>
								</nav>
								<!--/ End Main Menu -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->
	</header>
	<!--/ End Header -->

    {{ $slot }}




	<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
							<div class="col-lg-6 offset-lg-3 col-12">
								<h4 style="margin-top:100px;font-size:14px; font-weight:500; color:#F7941D; display:block; margin-bottom:5px;">Eshop Free Lite</h4>
								<h3 style="font-size:30px;color:#333;">Currently You are using free lite Version of Eshop.<h3>
								<p style="display:block; margin-top:20px; color:#888; font-size:14px; font-weight:400;">Please, purchase full version of the template to get all pages, features and commercial license</p>
								<div class="button" style="margin-top:30px;">
									<a href="https://wpthemesgrid.com/downloads/eshop-ecommerce-html5-template/" target="_blank" class="btn" style="color:#fff;">Buy Now!</a>
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- Modal end -->

	<!-- Start Footer Area -->
	<footer class="footer">
		<!-- Footer Top -->
		<div class="footer-top section">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer about">
							<div class="logo">
								<a href="index.html"><img src="{{ asset('images/logo2.png') }}" alt="#"></a>
							</div>
							<p class="text">Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue,  magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</p>
							<p class="call">Got Question? Call us 24/7<span><a href="tel:123456789">+0123 456 789</a></span></p>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4>Information</h4>
							<ul>
								<li><a href="#">About Us</a></li>
								<li><a href="#">Faq</a></li>
								<li><a href="#">Terms & Conditions</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Help</a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4>Customer Service</h4>
							<ul>
								<li><a href="#">Payment Methods</a></li>
								<li><a href="#">Money-back</a></li>
								<li><a href="#">Returns</a></li>
								<li><a href="#">Shipping</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer social">
							<h4>Get In Tuch</h4>
							<!-- Single Widget -->
							<div class="contact">
								<ul>
									<li>NO. 342 - London Oxford Street.</li>
									<li>012 United Kingdom.</li>
									<li>info@eshop.com</li>
									<li>+032 3456 7890</li>
								</ul>
							</div>
							<!-- End Single Widget -->
							<ul>
								<li><a href="#"><i class="ti-facebook"></i></a></li>
								<li><a href="#"><i class="ti-twitter"></i></a></li>
								<li><a href="#"><i class="ti-flickr"></i></a></li>
								<li><a href="#"><i class="ti-instagram"></i></a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Footer Top -->
		<div class="copyright">
			<div class="container">
				<div class="inner">
					<div class="row">
						<div class="col-lg-6 col-12">
							<div class="left">
								<p>Copyright © 2020 <a href="http://www.wpthemesgrid.com" target="_blank">Wpthemesgrid</a>  -  All Rights Reserved.</p>
							</div>
						</div>
						<div class="col-lg-6 col-12">
							<div class="right">
								<img src="{{ asset('images/payments.png') }}" alt="#">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- /End Footer Area -->

	<!-- Jquery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.4.0.min.js" integrity="sha256-mBCu5+bVfYzOqpYyK4jm30ZxAZRomuErKEFJFIyrwvM=" crossorigin="anonymous"></script>
	<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
	<!-- Popper JS -->
	<script src="{{ asset('js/popper.min.js') }}"></script>
	<script src="{{ asset('js/functions.js') }}"></script>
	<!-- Bootstrap JS -->
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	{{-- <script src="{{ asset('js/bootstrap.min.js') }}"></script> --}}
	<!-- Color JS -->
	{{-- <script src="{{ asset('js/colors.js') }}"></script> --}}
	<!-- Slicknav JS -->
	<script src="{{ asset('js/slicknav.min.js') }}"></script>
	<!-- Owl Carousel JS -->
	<script src="{{ asset('js/owl-carousel.js') }}"></script>
	<!-- Magnific Popup JS -->
	<script src="{{ asset('js/magnific-popup.js') }}"></script>
	<script src="{{ asset('js/facnybox.min.js') }}"></script>
	<!-- Waypoints JS -->
	<script src="{{ asset('js/waypoints.min.js') }}"></script>
	<!-- Countdown JS -->
	<script src="{{ asset('js/finalcountdown.min.js') }}"></script>
	{{-- <script src="{{ asset('js/js/ytplayer.min.js') }}"></script> --}}
	<!-- Nice Select JS -->
	<script src="{{ asset('js/nicesellect.js') }}"></script>
	<!-- Flex Slider JS -->
	<script src="{{ asset('js/flex-slider.js') }}"></script>
	<!-- ScrollUp JS -->
	<script src="{{ asset('js/scrollup.js') }}"></script>
	<!-- Onepage Nav JS -->
	<script src="{{ asset('js/onepage-nav.min.js') }}"></script>
	<!-- Easing JS -->
	<script src="{{ asset('js/easing.js') }}"></script>
	<!-- Active JS -->
	<script src="{{ asset('js/active.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.js" integrity="sha512-L7jgg7T9UbYc7hXogUKssqe1B5MsgrcviNxsRbO53dDSiw/JxuA/4kVQvEORmZJ6Re3fVF3byN5TT7czo9Rdug==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @livewireScripts
    @stack('scripts')
</body>
</html>
