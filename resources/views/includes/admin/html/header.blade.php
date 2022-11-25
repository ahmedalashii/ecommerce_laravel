<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-6">
                <div class="header-left d-flex align-items-center">
                    <div class="menu-toggle-btn mr-20">
                        <button id="menu-toggle" class="main-btn primary-btn btn-hover">
                            <i class="lni lni-chevron-left me-2"></i> Menu
                        </button>
                    </div>
                    {{-- <div class="header-search d-none d-md-flex">
                        <form action="#">
                            <input type="text" placeholder="Search..." />
                            <button><i class="lni lni-search-alt"></i></button>
                        </form>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-6">
                <div class="header-right">
                    <!-- profile start -->
                    <div class="menu-toggle-btn mr-20">
                        <form action="{{ route('public') }}" method="GET">
                            @csrf
                            <button type="submit" id="menu-toggle" class="main-btn primary-btn btn-hover"
                                style="width: auto; padding: 0px 12px; background-color: #4a6cf7;">
                                Go To Public Site
                            </button>
                        </form>
                    </div>
                    <div class="profile-box ml-15">
                        <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="profile-info">
                                <div class="info">
                                    <h6>{{ Auth::user()->name }}</h6>
                                    <div class="image">
                                        <img src="{{ Auth::user()->user_picture }}" alt=""
                                            style="width: 100%; height: 100%;" />
                                        <span class="status"></span>
                                    </div>
                                </div>
                            </div>
                            <i class="lni lni-chevron-down"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                            <li>
                                <a href="{{ route('admin.settings') }}"> <i class="lni lni-pencil"></i> Edit My Info
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" class="logoutForm">
                                    <i class="lni lni-exit"></i> Sign Out </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                    <!-- profile end -->
                </div>
            </div>
        </div>
    </div>
</header>
