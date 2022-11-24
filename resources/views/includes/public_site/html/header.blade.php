    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3" style="padding: 0px 0px !important; text-align:center;">
                    <a href="{{ route('public') }}"><img src="{{ $site_settings->site_logo }}" alt="No Logo provided!"></a>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="{{ route('public') }}">Home</a></li>
                            <li><a href="{{ route('public.stores') }}">Stores</a></li>
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
