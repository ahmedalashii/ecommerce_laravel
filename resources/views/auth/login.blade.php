<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
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
                            <h2>Sign in</h2>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- ========== title-wrapper end ========== -->

            <div class="row g-0 auth-row">
                <div class="col-lg-6">
                    <div class="auth-cover-wrapper bg-primary-100">
                        <div class="auth-cover">
                            <div class="title text-center">
                                <h1 class="text-primary mb-10">Welcome Back</h1>
                                <p class="text-medium">
                                    Sign in to your Existing account to continue
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
                    <div class="signin-wrapper">
                        <div class="form-wrapper">
                            <h6 class="mb-15">Login to <strong>UMBRELLA</strong></h6>
                            <p class="text-sm mb-25">
                                Enter email and password to login.
                            </p>
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-style-1">
                                            <label for="email">Email</label>
                                            <input type="email" placeholder="Email" id="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus />
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
                                            <input type="password" placeholder="Password" id="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password" />
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-xxl-6 col-lg-12 col-md-6">
                                        <div class="form-check checkbox-style mb-30">
                                            <input class="form-check-input" type="checkbox" value=""
                                                name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                                            <label class="form-check-label" for="remember">
                                                Remember me next time</label>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    {{-- <div class="col-xxl-6 col-lg-12 col-md-6">
                                        <div
                                            class="
                            text-start text-md-end text-lg-start text-xxl-end
                            mb-30
                          ">
                                            <a href="{{ route('password.request') }}" class="hover-underline">Forgot
                                                Password?</a>
                                        </div>
                                    </div> --}}
                                    <!-- end col -->
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
                                                Sign In
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                            </form>
                            <div class="singin-option pt-40">
                                <p class="text-sm text-medium text-dark text-center">
                                    Don’t have any account yet?
                                    <a href="{{ route('register') }}">Create an account</a>
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
