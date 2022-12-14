@extends('layouts.admin.MainLayout')

@section('MainContent')
    <main class="main-wrapper">
        <!-- ========== header start ========== -->
        @include('includes.admin.html.header')
        <!-- ========== header end ========== -->

        <section class="section">
            <div class="container-fluid">
                <div class="row">
                    {{-- @if ($status ?? false)
                        <div class="alert alert-success">Store has been added successfully</div>
                    @endif --}}

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
                                <h2>Edit Store</h2>
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
                            <form action="{{ route('admin.store.update', $store->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="profile-info">
                                    <div class="col-12">
                                        <div class="input-style-1">
                                            <label for="name">Name <b style="color: #d50100">*</b></label>
                                            <input type="text" placeholder="Name" id="name" name="name"
                                                value="{{ $store->name }}" />
                                        </div>
                                    </div>
                                    <div class="input-style-1">
                                        <label for="address">Address <b style="color: #d50100">*</b></label>
                                        <input type="text" placeholder="Address" value="{{ $store->address }}"
                                            name="address" id="address" />
                                    </div>
                                    <div class="card">
                                        <div class="input-style-1">
                                            <div class="mb-3">
                                                <label for="logo" class="form-label">Logo</label>
                                                <input class="form-control" type="file" id="logo" name="logo"
                                                    accept="image/png, image/gif, image/jpeg, image/jpg" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="main-btn primary-btn btn-hover" type="submit">
                                            Update Store
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
