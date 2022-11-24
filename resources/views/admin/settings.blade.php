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
                                <h2>Admin Info</h2>
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
                                <h6>My Profile</h6>
                            </div>
                            <form action="{{ route('admin.edit.info', $user->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="profile-info">
                                    <div class="d-flex align-items-center mb-30">
                                        <div class="profile-image">
                                            <img src="{{ Auth::user()->user_picture }}" alt="No Image!" id="picture_user"
                                                style="width: 100%; height: 100%;" />
                                            <div class="update-image">
                                                <input type="file" id="user_picture" name="user_picture"
                                                    accept="image/png, image/gif, image/jpeg" />
                                                <label for="user_picture"><i class="lni lni-cloud-upload"></i></label>
                                            </div>
                                        </div>
                                        <div class="profile-meta">
                                            <h5 class="text-bold text-dark mb-10">{{ $user->name }}</h5>
                                            <p class="text-sm text-gray">An Adminstrator</p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-style-1">
                                            <label for="name">Name <b style="color: #d50100">*</b></label>
                                            <input type="text" placeholder="Name" id="name" name="name"
                                                value="{{ $user->name }}" required />
                                        </div>
                                    </div>
                                    <div class="input-style-1">
                                        <label for="email">Email <b style="color: #d50100">*</b></label>
                                        <input type="email" placeholder="admin@example.com" value="{{ $user->email }}"
                                            name="email" id="email" required />
                                    </div>
                                    <div class="col-12">
                                        <div class="input-style-1">
                                            <label for="address">Address <b style="color: #d50100">*</b></label>
                                            <input type="text" placeholder="Address" value="{{ $user->address }}"
                                                name="address" id="address" required />
                                        </div>
                                    </div>
                                    {{-- <div class="input-style-1">
                                        <label for="password">Password</label>
                                        <input type="password" value="whatever-password-is" id="password"
                                            name="password" />
                                    </div> --}}

                                    <div class="input-style-1">
                                        <label for="about_me">About Me <b style="color: #d50100">*</b></label>
                                        <textarea placeholder="Write your bio here" rows="4" id="about_me" name="about_me" required>{{ $user->description }}</textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="main-btn primary-btn btn-hover" type="submit">
                                            Update Profile
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
