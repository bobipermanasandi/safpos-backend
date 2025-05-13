
@extends('layouts.auth')

@section('title', 'Register')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
@endpush

@section('main')
    <div class="d-flex align-items-stretch flex-wrap">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
            <div class="m-3 p-4">
                <img src="{{ asset('img/stisla-fill.svg') }}"
                    alt="logo"
                    width="80"
                    class="shadow-light rounded-circle mb-5 mt-2">
                <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">Safna POS</span>
                </h4>
                <p class="text-muted">Before you get started, you must register if you don't already
                    have an account.</p>
                <form method="POST"
                    action="{{route('register.store')}}"
                    class="needs-validation"
                    novalidate="">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name"
                            type="text"
                            class="form-control @error('name')
                                is-invalid
                            @enderror"
                            name="name"
                            tabindex="1"
                            autofocus>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email"
                            type="email"
                            class="form-control @error('email')
                                is-invalid
                            @enderror"
                            name="email"
                            tabindex="1"
                            autofocus>
                            @error('email')
                                <div class="invalid-feedback">
                                    Please fill in your email
                                </div>
                            @enderror

                    </div>

                    <div class="form-group">
                        <div class="d-block">
                            <label for="password"
                                class="control-label">Password</label>
                        </div>
                        <input id="password"
                            type="password"
                            class="form-control @error('password')
                                is-invalid
                            @enderror"
                            name="password"
                            tabindex="2">
                            @error('password')
                                <div class="invalid-feedback">
                                    please fill in your password
                                </div>
                            @enderror

                    </div>

                    <div class="form-group">
                        <div class="d-block">
                            <label for="password_confirmation"
                                class="control-label">Confirm Password</label>
                        </div>
                        <input id="password_confirmation"
                            type="password"
                            class="form-control @error('password_confirmation')
                                is-invalid
                            @enderror"
                            name="password_confirmation"
                            tabindex="2">
                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    please fill in your confirm password
                                </div>
                            @enderror

                    </div>

                    <div class="form-group text-right">
                        <button type="submit"
                            class="btn btn-primary btn-lg btn-icon icon-right"
                            tabindex="4">
                            Register
                        </button>
                    </div>

                    <div class="mt-5 text-center">
                        Already have an account? <a href="{{route('login')}}">Login</a>
                    </div>
                </form>

                <div class="text-small mt-5 text-center">
                    Copyright &copy; Made with 💙 by CodeSynesia
                    <div class="mt-2">
                        <a href="#">Privacy Policy</a>
                        <div class="bullet"></div>
                        <a href="#">Terms of Service</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 min-vh-100 background-walk-y position-relative overlay-gradient-bottom order-1"
            data-background="{{ asset('img/unsplash/login-bg.jpg') }}">
            <div class="absolute-bottom-left index-2">
                <div class="text-light p-5 pb-2">
                    <div class="mb-5 pb-3">
                        <h1 class="display-4 font-weight-bold mb-2">Good Morning</h1>
                        <h5 class="font-weight-normal text-muted-transparent">Bali, Indonesia</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush

