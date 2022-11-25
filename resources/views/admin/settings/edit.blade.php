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
                                <h2>Edit Site Settings</h2>
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
                                <h6>Site Settings</h6>
                            </div>
                            <form action="{{ route('admin.site.settings') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card">
                                    <div class="input-style-1">
                                        <label for="dashboard_logo" class="form-label">Dashboard Logo</label>
                                        <input class="form-control" type="file" id="dashboard_logo" name="dashboard_logo"
                                            accept="image/png, image/gif, image/jpeg, image/jpg, image/svg+xml" />
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="input-style-1">
                                        <label for="site_logo" class="form-label">Public Site Logo</label>
                                        <input class="form-control" type="file" id="site_logo" name="site_logo"
                                            accept="image/png, image/gif, image/jpeg, image/jpg, image/svg+xml" />
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="input-style-1">
                                        <label for="site_light_logo" class="form-label">Public Site Light Logo</label>
                                        <input class="form-control" type="file" id="site_light_logo"
                                            name="site_light_logo"
                                            accept="image/png, image/gif, image/jpeg, image/jpg, image/svg+xml" />
                                    </div>
                                </div>
                                <div class="profile-info">
                                    <div class="col-12">
                                        <div class="input-style-1">
                                            <label for="country">Country <b style="color: #d50100">*</b></label>
                                            <input type="text" placeholder="Country" id="country" name="country"
                                                value=" {{ $settings->country }} " required />
                                        </div>
                                    </div>
                                    <div class="input-style-1">
                                        <label for="address">Address <b style="color: #d50100">*</b></label>
                                        <input type="text" placeholder="Address" name="address" id="address" required
                                            value="{{ $settings->address }}" />
                                    </div>
                                    <div class="select-style-1">
                                        <label for="currency">Currency <b
                                                style="color: #d50100">*</b></label>
                                        <div class="select-position">
                                            <select id="currency" name="currency" required>
                                                <option value="-1">Select Currency</option>
                                                @foreach ($currencies ?? [] as $currency_key => $currency_value)
                                                    <option value="{{ $currency_key }}" @if ($settings->currency == $currency_key) selected @endif>{{ $currency_key . " " . $currency_value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="input-style-1">
                                        <label for="description">Description <b style="color: #d50100">*</b></label>
                                        <div class="input-style-3">
                                            <textarea name="description" id="description" rows="5" placeholder="Enter Site's Description Here">{{ $settings->description }}</textarea>
                                            <span class="icon">
                                                <i class="lni lni-text-format"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="main-btn primary-btn btn-hover" type="submit">
                                            Update Settings
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
