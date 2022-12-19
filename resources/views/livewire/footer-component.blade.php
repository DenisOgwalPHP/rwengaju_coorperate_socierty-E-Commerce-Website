<div>



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
                        <p class="call">Got Question? Call us 24/7<span><a href="tel:{{ $setting->phone }}">{{ $setting->phone }}</a></span></p>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-2 col-md-6 col-12">
                    <!-- Single Widget -->
                        @php
                        $navlinks = array ( 'products' => 'Products', 'agri-inputs' => 'Agri-Inputs', 'blogs' => 'Blogs', 'contact-us' => 'Contact Us');
                        $current_page = substr($_SERVER['REQUEST_URI'], 1);  // trim off the leading slash
                        $current_page = str_replace('.php', '', $current_page);  // trim off the extension
                    @endphp
                    <div class="single-footer links">

                        <h4>Pages</h4>
                        <ul>
                            <li class="{{ $current_page == '' ? 'active': '' }}"><a  href="/">Home</a></li>
                            <li class="{{ $current_page == 'products' ? 'active': '' }}"><a  href="{{ route('products') }}">Products</a></li>
                            <li class="{{ $current_page == 'agri-inputs' ? 'active': '' }}"><a  href="{{ route('inputs') }}">Agri-Inputs</a></li>
                            <li class="{{ $current_page == 'blogs' ? 'active': '' }}"><a  href="{{ route('blogs') }}">Blogs</a></li>
                            <li class="{{ $current_page == 'contact-us' ? 'active': '' }}"><a  href="{{ route('contact') }}">Contact Us</a></li>

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
                                <li>{{ $setting->address }}</li>
                                <li>{{ $setting->email }}</li>
                                <li>{{ $setting->phone }}</li>
                                @if ($setting->phone2 )
                                    <li>{{ $setting->phone2 }}</li>
                                @endif
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                        <ul>
                            <li><a href="{{ $setting->facebook }}"><i class="ti-facebook"></i></a></li>
                            <li><a href="{{ $setting->twitter }}"><i class="ti-twitter"></i></a></li>
                            <li><a href="{{ $setting->linkedIn }}"><i class="fa-brands fa-linkedin"></i></a></li>
                            <li><a href="{{ $setting->instagram }}"><i class="ti-instagram"></i></a></li>
                        </ul>
                    </div>
                    <!-- End Single Widget -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Top -->

</footer>
<!-- /End Footer Area -->
</div>
