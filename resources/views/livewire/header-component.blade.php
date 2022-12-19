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
                            <li><i class="ti-headphone-alt"></i> <a href="tel:{{ $setting->phone }}">{{ $setting->phone }}</a></li>
                            <li><i class="ti-email"></i> <a href="mail:{{ $setting->email }}">{{ $setting->email }}</a> </li>
                        </ul>
                    </div>
                    <!--/ End Top Left -->
                </div>
                <div class="col-lg-7 col-md-12 col-12">
                    <!-- Top Right -->
                    <div class="right-content">
                        <ul class="list-main ">
                            <li><i class="ti-location-pin"></i> Store location ({{  $setting->address  }})</li>
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
