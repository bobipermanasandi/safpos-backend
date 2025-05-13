@extends('layouts.app')

@section('title', 'Create User')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Add User</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">New User</h2>
                <p class="section-lead">
                    Please input data new user
                </p>
                <div class="card">
                    <form method="POST" action="{{ route('users.store') }}" class="needs-validation" novalidate="">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" type="text"
                                    class="form-control @error('name')
                                            is-invalid
                                        @enderror"
                                    name="name" tabindex="1" autofocus>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email"
                                    class="form-control @error('email')
                                            is-invalid
                                        @enderror"
                                    name="email" tabindex="1" autofocus>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                    </div>
                                    <input id="phone" type="text" name="phone"
                                        class="form-control phone-number @error('phone')
                                            is-invalid
                                        @enderror">
                                    @error('phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </div>
                                    </div>
                                    <input type="password" name="password"
                                        class="form-control pwstrength @error('password')
                                            is-invalid
                                        @enderror"
                                        data-indicator="pwindicator">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div id="pwindicator" class="pwindicator">
                                    <div class="bar"></div>
                                    <div class="label"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Roles</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="roles" value="admin" class="selectgroup-input"
                                            checked="">
                                        <span class="selectgroup-button">Admin</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="roles" value="staff" class="selectgroup-input">
                                        <span class="selectgroup-button">Staff</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="roles" value="user" class="selectgroup-input">
                                        <span class="selectgroup-button">User</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
