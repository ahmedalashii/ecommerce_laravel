@extends('layouts.public_site.mainLayout')

@section('MainContent')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Check Out</h4>
                        <div class="breadcrumb__links">
                            <a href="{{ route('public') }}">Home</a>
                            <a href="{{ route('public.stores') }}">Stores</a>
                            <span>Check Out</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                @foreach ($errors->all() as $message)
                    <div class="alert alert-danger">{{ $message }}</div>
                @endforeach
                <form action="{{ route('public.product.checkout', $product->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p><label for="name">Name</label><span>*</span></p>
                                        <input type="text" id="name" name="name" placeholder="Enter Your Name">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p><label for="address">Address</label><span>*</span></p>
                                <input type="text" placeholder="Address" class="checkout__input__add" id="address"
                                    name="address">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p><label for="phone">Phone</label><span>*</span></p>
                                        <input type="text" id="phone" name="phone" placeholder="Enter Your Phone">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p><label for="email">Email</label><span>*</span></p>
                                        <input type="text" id="email" name="email" placeholder="Enter Your Email">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout__order__products">Product <span>Total</span></div>
                                <ul class="checkout__total__products">
                                    <li>{{ $product->name }} <span>
                                            @if ($product->is_discount)
                                                ${{ $product->discount_price }}
                                                <del
                                                    style="color: #878787; font-size: 12px;">${{ $product->base_price }}</del>
                                            @else
                                                ${{ $product->base_price }}
                                            @endif
                                        </span></li>
                                </ul>
                                <ul class="checkout__total__all">
                                    <li>Total <span>${{ $total }}</span></li>
                                </ul>
                                <button type="submit" class="site-btn">Confirm Purchasing</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@stop
