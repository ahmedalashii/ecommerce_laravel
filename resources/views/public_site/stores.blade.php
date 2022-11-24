@extends('layouts.public_site.mainlayout')

@section('MainContent')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Stores</h4>
                        <div class="breadcrumb__links">
                            <a href="{{ route('public') }}">Home</a>
                            <span>Stores</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Stores Section Begin -->
    <section class="shop spad" style="padding-top: 50px;
    padding-bottom: 100px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2
                        style=" 
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 2px;
                margin-bottom: 20px; text-align: center;">
                        All Stores</h2>
                    <div class="row">
                        @foreach ($stores as $store)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg img-thumbnail"
                                        data-setbg="{{ $store->logo_image }}"
                                        style="background-image: url(&quot;{{ $store->logo_image }}&quot;);   background-size: auto;:"                           ">
                                    </div>
                                    <div class="product__item__text">
                                        <h6 style="font-weight: 700; font-size: 18px;">{{ $store->name }}</h6>
                                        <a href="{{ route('public.products', $store->id, 5) }}" class="add-cart">Shop Now</a>
                                        <h5 style="font-weight: 500; font-size: 14px;">{{ $store->address }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div @if ($stores->hasPages()) class="d-flex justify-content-center mt-3" @endif>
                        {{ $stores->links() }}
                    </div>
                    {{-- Custom Pagination if we want --}}
                    {{-- <div class="row">
                        <div class="col-lg-12">
                            <div class="product__pagination">
                                <a class="active" href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <span>...</span>
                                <a href="#">21</a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- Stores Section End -->
@stop
