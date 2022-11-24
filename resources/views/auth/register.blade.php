<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    @include('includes.admin.css.allStyles')

</head>

<body>
    <section class="signin-section">
        <div class="container">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title mb-30">
                            <h2>Sign up</h2>
                        </div>
                    </div>

                </div>
                <!-- end row -->
            </div>
            <!-- ========== title-wrapper end ========== -->

            <div class="row g-0 auth-row">
                <div class="col-lg-6">
                    <div class="auth-cover-wrapper bg-primary-100">
                        <div class="auth-cover">
                            <div class="title text-center">
                                <h1 class="text-primary mb-10">Getting Started</h1>
                                <p class="text-medium">
                                    Enter your information to register in <strong>UMBRELLA</strong>
                                    <br class="d-sm-block" />
                                    to manage stores, and products.
                                </p>
                            </div>
                            <div class="cover-image">
                                <img src="{{ asset('admin-panel/images/auth/signin-image.svg') }}" alt="" />
                            </div>
                            <div class="shape-image">
                                <img src="{{ asset('admin-panel/images/auth/shape.svg') }}" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                    <div class="signup-wrapper">
                        <div class="form-wrapper">
                            <h6 class="mb-15">Sign Up Now</h6>
                            <p class="text-sm mb-25">
                                Fill in the form below to get instant access:
                            </p>
                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-style-1">
                                            <label for="name">Name</label>
                                            <input type="text" placeholder="Name" value="{{ old('name') }}"
                                                id="name" name="name" autofocus autocomplete="name" required
                                                class="form-control @error('name') is-invalid @enderror" />
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-12">
                                        <div class="input-style-1">
                                            <label for="email">Email</label>
                                            <input type="email" placeholder="Email" id="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" />
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-12">
                                        <div class="input-style-1">
                                            <label for="password">Password</label>
                                            <input type="password" placeholder="Password" name="password"
                                                class="form-control @error('password') is-invalid @enderror" required
                                                autocomplete="new-password" />
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-style-1">
                                            <label for="password-confirm">Confirm Password</label>
                                            <input type="password-confirm" placeholder="Password"
                                                name="password_confirmation" class="form-control" required
                                                autocomplete="new-password" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div
                                            class="
                              button-group
                              d-flex
                              justify-content-center
                              flex-wrap
                            ">
                                            <button type="submit"
                                                class="
                                main-btn
                                primary-btn
                                btn-hover
                                w-100
                                text-center
                              ">
                                                Sign Up
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                            </form>
                            <div class="singup-option pt-40">
                                <p class="text-sm text-medium text-dark text-center">
                                    Already have an account? <a href="{{ route('login') }}">Sign In</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </section>
    @include('includes.admin.js.allJS')

</body>

</html>
