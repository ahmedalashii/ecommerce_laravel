@extends('layouts.mainLayout')

@section('MainContent')
    <main class="main-wrapper">
        <!-- ========== header start ========== -->
        @include('includes.html.header')
        <!-- ========== header end ========== -->

        <section class="section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @foreach ($errors->all() as $message)
                            <div class="alert alert-danger">{{ $message }}</div>
                        @endforeach
                    </div>
                </div>

                <!-- ========== title-wrapper start ========== -->
                <div class="title-wrapper pt-30">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="titlemb-30">
                                <h2>Add New Product</h2>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- ========== title-wrapper end ========== -->

                <div class="row pt-20">
                    <div class="col-lg-12">
                        <div class="card-style settings-card-1 mb-30">
                            <div
                                class="
                        title
                        mb-30
                        d-flex
                        justify-content-between
                        align-items-center
                      ">
                                <h6>Store Info</h6>
                            </div>
                            <form action="{{ route('admin.product.store') }}" method="POST">
                                @csrf
                                <div class="profile-info">
                                    <div class="input-style-1">
                                        <label for="name">Name</label>
                                        <input type="text" placeholder="Name" id="name" name="name"
                                            value="" />
                                    </div>
                                    <div class="input-style-3">
                                        <textarea name="description" id="description" rows="5" placeholder="Enter Product's Description Here"></textarea>
                                        <span class="icon">
                                            <i class="lni lni-text-format"></i>
                                        </span>
                                    </div>
                                    <div class="input-style-1">
                                        <label for="base_price">Base Price</label>
                                        <input type="number" placeholder="Base Price" value="0" name="base_price"
                                            id="base_price" min="0" />
                                    </div>
                                    <div class="input-style-1">
                                        <label for="discount_price">Discount Price</label>
                                        <input type="number" placeholder="Discount Price" value="0"
                                            name="discount_price" id="discount_price" min="0" />
                                    </div>

                                    <div class="form-check form-switch toggle-switch">
                                        <label class="form-check-label" for="toggleSwitch2">Default switch checkbox
                                            input</label>
                                        <input class="form-check-input" type="checkbox" id="toggleSwitch2" checked="">
                                    </div>

                                    <br>
                                    <div class="col-12">
                                        <button class="main-btn primary-btn btn-hover" type="submit">
                                            Add Store
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
    </main>
@stop
