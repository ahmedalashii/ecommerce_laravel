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
                                <h2>Add New Store</h2>
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
                            <form action="{{ route('admin.store.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="profile-info">
                                    <div class="col-12">
                                        <div class="input-style-1">
                                            <label for="name">Name</label>
                                            <input type="text" placeholder="Name" id="name" name="name"
                                                value="" />
                                        </div>
                                    </div>
                                    <div class="input-style-1">
                                        <label for="address">Address</label>
                                        <input type="text" placeholder="Address" value="" name="address"
                                            id="address" />
                                    </div>
                                    <div class="card">
                                        <div class="input-style-1">
                                            <div class="mb-3">
                                                <label for="logo" class="form-label">Logo</label>
                                                <input class="form-control" type="file" id="logo" name="logo" />
                                            </div>
                                        </div>
                                    </div>
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
