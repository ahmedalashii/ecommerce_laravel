    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3" style="padding: 0px 0px !important; text-align:center;">
                    <a href="#"><img src="{{ $site_settings->site_logo }}" alt="No Logo provided!"></a>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="#">Home</a></li>
                            <li><a href="#">Stores</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="./about.html">About Us</a></li>
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shopping-cart.html">Shopping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                {{-- <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <a href="#" class="search-switch"><img
                                src="{{ asset('public_site/images/icons/search.png') }}" alt=""></a>
                    </div>
                </div> --}}
                <div class="col-lg-3 col-md-3">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li>
                                <a href="{{ route('admin') }}">
                                    @if (Auth::user())
                                        Go to Dashboard
                                    @else
                                        Sign in as admin
                                    @endif
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
