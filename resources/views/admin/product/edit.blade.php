@extends('layouts.admin.MainLayout')

@section('MainContent')
    <main class="main-wrapper">
        <!-- ========== header start ========== -->
        @include('includes.admin.html.header')
        <!-- ========== header end ========== -->

        <section class="section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mt-2">
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
                                <h2>Edit Product</h2>
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
                                <h6>Product Info</h6>
                            </div>
                            <form action="{{ route('admin.product.update', $product->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="profile-info">
                                    <div class="input-style-1">
                                        <label for="name">Name <b style="color: #d50100">*</b></label>
                                        <input type="text" placeholder="Name" id="name" name="name"
                                            value="{{ $product->name }}" />
                                    </div>
                                    <div class="input-style-1">
                                        <label for="description">Description <b style="color: #d50100">*</b></label>
                                        <div class="input-style-3">
                                            <textarea name="description" id="description" rows="5" placeholder="Enter Product's Description Here">{{ $product->description }}</textarea>
                                            <span class="icon">
                                                <i class="lni lni-text-format"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="select-style-1">
                                        <label for="store">To which store this product belong? <b
                                                style="color: #d50100">*</b></label>
                                        <div class="select-position">
                                            <select id="store" name="store" required>
                                                <option value="-1">Select store</option>
                                                @foreach ($stores as $store)
                                                    <option value="{{ $store->id }}"
                                                        @if ($product->store->id == $store->id) selected @endif>
                                                        {{ $store->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-style-1">
                                        <label for="base_price">Base Price (USD) <b style="color: #d50100">*</b></label>
                                        <input type="number" placeholder="Base Price" value="{{ $product->base_price }}"
                                            name="base_price" id="base_price" min="10" />
                                    </div>
                                    <div class="input-style-1">
                                        <label for="discount_price">Discount Price (USD)<b
                                                style="color: #d50100">*</b></label>
                                        <input type="number" placeholder="Discount Price"
                                            value="{{ $product->discount_price }}" name="discount_price" id="discount_price"
                                            min="5" />
                                    </div>


                                    <div class="form-check form-switch toggle-switch">
                                        <label class="form-check-label" for="is_discount">is Discount allowed?</label>
                                        <input class="form-check-input" type="checkbox" id="is_discount"
                                            @if ($product->is_discount) checked @endif name="is_discount">
                                    </div>

                                    <br>
                                    <div class="card">
                                        <div class="input-style-1">
                                            <div class="mb-3">
                                                <label for="product_picture" class="form-label">Product Picture</label>
                                                <input class="form-control" type="file" id="product_picture"
                                                    name="product_picture"
                                                    accept="image/png, image/gif, image/jpeg, image/jpg, image/svg" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="main-btn primary-btn btn-hover" type="submit">
                                            Update Product
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
