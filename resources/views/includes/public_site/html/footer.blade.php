<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a href="#"><img src="{{ $site_settings->site_light_logo }}"
                                alt="No Light Logo provided!"></a>
                    </div>
                    <p>{{ $site_settings->description }}</p>
                </div>
            </div>
            <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                <h5
                    style="color: #ffffff;
                font-size: 15px;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 2px;
                margin-bottom: 20px;">
                    {{ $site_settings->country }}</h5>
                <p style="    color: #b7b7b7;
                font-size: 15px;
            }">{{ $site_settings->address }}</p>
            </div>
            <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                <div class="footer__widget">
                    <h6>Shopping</h6>
                    <ul>
                        <li><a href="#">Stores</a></li>
                        <li><a href="#">Trending Shoes</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</footer>

<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search for products here..">
        </form>
    </div>
</div>
