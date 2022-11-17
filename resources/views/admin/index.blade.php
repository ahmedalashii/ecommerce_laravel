@extends('layouts.MainLayout')

@section('MainContent')

    <main class="main-wrapper">
        <!-- ========== header start ========== -->
        @include('includes.html.header')
        <!-- ========== header end ========== -->

        <!-- ========== section start ========== -->
        <section class="section">
            <div class="container-fluid">
                <!-- ========== title-wrapper start ========== -->
                <div class="title-wrapper pt-30">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="title mb-30">
                                <h2>Dashboard</h2>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- ========== title-wrapper end ========== -->
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon purple">
                                {{-- <i class="lni lni-cart-full"></i> --}}
                                <svg enable-background="new 0 0 32 32" height="32px" id="Layer_1" version="1.1"
                                    viewBox="0 0 32 32" width="23px" xml:space="preserve"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    fill="none">
                                    <path
                                        d="M31.4,11.2l-3-3.998c-0.117-0.157-0.256-0.293-0.4-0.423V2c0-1.104-0.896-2-2-2H6  C4.895,0,4,0.896,4,2v4.78C3.856,6.909,3.717,7.044,3.6,7.2l-2.999,3.999C0.213,11.715,0,12.354,0,13v1c0,1.654,1.346,3,3,3h0v13  c0,1.104,0.896,2,2,2h22c1.104,0,2-0.896,2-2V17l0,0c1.654,0,3-1.346,3-3v-1C32,12.354,31.787,11.715,31.4,11.2z M26,2v4H6h0V2H26z   M10.193,15H6.004l4-7h2.189L10.193,15z M13.234,8H15.5v7h-4.266L13.234,8z M16.5,8h2.266l2,7H16.5V8z M19.805,8h2.189l4,7h-4.189  L19.805,8z M2,14v-1c0-0.217,0.07-0.427,0.2-0.6l3-4C5.389,8.148,5.685,8,6,8h2.852l-4,7H3C2.448,15,2,14.553,2,14z M20,30h-7.5V20  H20V30z M27,30h-6V20c0-0.553-0.449-1-1-1h-7.5c-0.552,0-1,0.447-1,1v10H5V17h22V30z M30,14c0,0.553-0.447,1-1,1h-1.854l-4-7H26l0,0  c0.314,0,0.611,0.148,0.799,0.4l3,4C29.93,12.573,30,12.783,30,13V14z"
                                        fill="currentColor" id="shop_1_" />
                                </svg>
                            </div>
                            <div class="content">
                                <h6 class="mb-10">Active Stores</h6>
                                <h3 class="text-bold mb-10" data-kt-countup="true"
                                    data-kt-countup-value="{{ $stores_count }}">{{ $stores_count }}
                                </h3>
                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div>
                    <!-- End Col -->
                    <div class="col-xl-4 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon success">
                                {{-- <i class="lni lni-dollar"></i> --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="32px" class="bi bi-cart"
                                    viewBox="0 0 16 16">
                                    <path fill="currentColor"
                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                            </div>
                            <div class="content">
                                <h6 class="mb-10">Products</h6>
                                <h3 class="text-bold mb-10" data-kt-countup="true"
                                    data-kt-countup-value="{{ $products_count }}">{{ $products_count }}
                                </h3>
                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div>
                    <!-- End Col -->
                    <div class="col-xl-4 col-lg-3 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon primary">
                                <i class="lni lni-credit-cards"></i>
                            </div>
                            <div class="content">
                                <h6 class="mb-10">Purchase Transactions</h6>
                                <h3 class="text-bold mb-10" data-kt-countup="true"
                                    data-kt-countup-value="{{ $purchase_transactions_count }}">
                                    {{ $purchase_transactions_count }}
                                </h3>
                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div>
                    {{-- <!-- End Col -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon orange">
                                <i class="lni lni-user"></i>
                            </div>
                            <div class="content">
                                <h6 class="mb-10">New User</h6>
                                <h3 class="text-bold mb-10">34567</h3>
                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div> --}}
                    <!-- End Col -->
                </div>
                <!-- End Row -->

                <div class="row">
                    <!-- End Col -->
                    <div class="col-lg-12">
                        <div class="card-style mb-30">
                            <div
                                class="
                      title
                      d-flex
                      flex-wrap
                      justify-content-between
                      align-items-center
                    ">
                                <div class="left">
                                    <h6 class="text-medium mb-30">Products</h6>
                                </div>
                            </div>
                            <!-- End Title -->
                            <div class="table-responsive">
                                <table class="table top-selling-table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <h6 class="text-sm text-medium">Picture</h6>
                                            </th>
                                            <th class="min-width">
                                                <h6 class="text-sm text-medium">Name</h6>
                                            </th>
                                            <th class="min-width">
                                                <h6 class="text-sm text-medium">Store</h6>
                                            </th>
                                            <th class="min-width">
                                                <h6 class="text-sm text-medium">Base Price</h6>
                                            </th>
                                            <th class="min-width">
                                                <h6 class="text-sm text-medium">Discount Price</h6>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="product">
                                                    <div class="image">
                                                        <img src="assets/images/products/product-mini-1.jpg"
                                                            alt="" />
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm">Interior</p>
                                            </td>
                                            <td>
                                                <p class="text-sm">$345</p>
                                            </td>
                                            <td>
                                                <p class="text-sm">43</p>
                                            </td>
                                            <td>
                                                <p class="text-sm">$45</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- End Table -->
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
            <!-- end container -->
        </section>
        <!-- ========== section end ========== -->
    </main>
@stop
