@extends('layouts.public_site.mainLayout')

@section('MainContent')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>{{ $store->name }} Products</h4>
                        <div class="breadcrumb__links">
                            <a href="{{ route('public') }}">Home</a>
                            <span>{{ $store->name }} Products</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- A Specific Store Products Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="{{ route('public.products', ['store' => $store->id]) }}" method="GET">
                                @csrf
                                <input type="text" placeholder="Search..." name="search">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                                    </div>
                                    <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__price">
                                                <ul>
                                                    <li><a
                                                            href="{{ route('public.products', ['store' => $store->id, 'start_price' => 0.0, 'end_price' => 50.0]) }}">$0.00
                                                            -
                                                            $50.00</a></li>
                                                    <li><a
                                                            href="{{ route('public.products', ['store' => $store->id, 'start_price' => 50.0, 'end_price' => 100.0]) }}">$50.00
                                                            - $100.00</a></li>
                                                    <li><a
                                                            href="{{ route('public.products', ['store' => $store->id, 'start_price' => 100.0, 'end_price' => 150.0]) }}">$100.00
                                                            - $150.00</a></li>
                                                    <li><a
                                                            href="{{ route('public.products', ['store' => $store->id, 'start_price' => 150.0, 'end_price' => 200.0]) }}">$150.00
                                                            - $200.00</a></li>
                                                    <li><a
                                                            href="{{ route('public.products', ['store' => $store->id, 'start_price' => 200.0, 'end_price' => 250.0]) }}">$200.00
                                                            - $250.00</a></li>
                                                    <li><a
                                                            href="{{ route('public.products', ['store' => $store->id, 'start_price' => 250]) }}">$250.00+</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <a href="{{ route('public.products', ['store' => $store->id]) }}"
                                        class="primary-btn">Reset</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-12 mt-2">
                            @foreach ($errors->all() as $message)
                                <div class="alert alert-danger">{{ $message }}</div>
                            @endforeach
                        </div>
                    </div>
                    @if ($products->isNotEmpty())
                        <div class="shop__product__option">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="shop__product__option__left">
                                        <p>Showing 1–12 of 126 results</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="shop__product__option__right">
                                        <form action="{{ route('public.products.sort', $store->id) }}" method="GET">
                                            @csrf
                                            <label for="sort_way">Sort by Price:</label>
                                            <select id="sort_way" name="sort_way" onchange="javascript:this.form.submit()">
                                                <option value="-1">Select Sorting Way</option>
                                                <option value="ASC" @if (($sort_way ?? '') == 'ASC') selected @endif>Low
                                                    To High</option>
                                                <option value="DESC" @if (($sort_way ?? '') == 'DESC') selected @endif>
                                                    High To Low</option>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($products->isNotEmpty())
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item img-thumbnail">
                                        <div class="product__item__pic set-bg" data-setbg="{{ $product->product_picture }}"
                                            style="background-image: url(&quot;{{ $product->product_picture }}&quot;);">
                                            @if ($product->is_discount)
                                                <span class="label" style="background-color: #d50100; color: white;">Save
                                                    {{ ceil((($product->base_price - $product->discount_price) / $product->base_price) * 100) }}%</span>
                                            @endif
                                        </div>
                                        <div class="product__item__text">
                                            <h6>{{ $product->name }}</h6>
                                            <a href="#" class="add-cart">Purchase Checkout</a>
                                            @if ($product->is_discount)
                                                <h5>
                                                    ${{ $product->discount_price }} <del
                                                        style="color: #878787; font-size: 12px;">${{ $product->base_price }}</del>
                                                </h5>
                                            @else
                                                <h5>${{ $product->base_price }}</h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="row" style="justify-content: center">
                            <img src="{{ asset('public_site/images/no_data.png') }}"
                                alt="No Products for this store found!" width="500px" height="470px">
                        </div>
                    @endif
                    <div @if ($products->hasPages()) class="d-flex justify-content-center mt-3" @endif>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- A Specific Store Products Section End -->
@endsection
