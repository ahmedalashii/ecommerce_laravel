@extends('layouts.public_site.mainLayout')

@section('MainContent')

    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__items set-bg" data-setbg="{{ asset('public_site/images/hero/hero-1.jpg') }}"
                style="background-image: url('{{ asset('public_site/images/hero/hero-1.jpg') }}');">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>The best stores you will ever find!</h6>
                                <h2>UMBRELLA STORES</h2>
                                <p>{{ $site_settings->description }}</p>
                                <a href="#" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__items set-bg" data-setbg="{{ asset('public_site/images/hero/hero-2.jpg') }}"
                style="background-image: url('{{ asset('public_site/images/hero/hero-2.jpg') }}');">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>The best stores you will ever find!</h6>
                                <h2>UMBRELLA STORES</h2>
                                <p>{{ $site_settings->description }}</p>
                                <a href="#" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="col-lg-12 p-5">
        <h2
            style=" 
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 20px; text-align: center;">
            Best Stores</h2>
        <br>
        <div class="row">
            @foreach ($stores as $store)
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg img-thumbnail" data-setbg="{{ $store->logo_image }}"
                            style="background-image: url(&quot;{{ $store->logo_image }}&quot;);   background-size: auto;                            ">
                        </div>
                        <div class="product__item__text">
                            <h6 style="font-weight: 700; font-size: 18px;">{{ $store->name }}</h6>
                            <a href="#" class="add-cart">Shop Now</a>
                            <h5 style="font-weight: 500; font-size: 14px;">{{ $store->address }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop
