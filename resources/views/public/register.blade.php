@extends('public.auth.layout')
@section('title', 'Register')
@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh; width: 100%">
        <div class="card" style="width: 400px">
            <div class="card-body">
                <h3>Register</h3>

                <form action="{{ route('user.register') }}" method="POST">
                    @csrf

                    @error('message')
                        <div class="mt-1">
                            <span class="ml-2 text-danger">
                                <small>{{ $message }}</small>
                            </span>
                        </div>
                    @enderror

                    <div class="mt-10">
                        <input
                            type="name"
                            name="name"
                            placeholder="Nama"
                            onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Nama'"
                            required=""
                            value="{{ old('name') }}"
                            class="single-input-primary"
                        />
                        @error('email')
                            <div class="mt-1">
                                <span class="ml-2 text-danger">
                                    <small>{{ $message }}</small>
                                </span>
                            </div>
                        @enderror
                    </div>

                    <div class="mt-10">
                        <input
                            type="email"
                            name="email"
                            placeholder="Email"
                            onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Email'"
                            required=""
                            value="{{ old('email') }}"
                            class="single-input-primary"
                        />
                        @error('email')
                            <div class="mt-1">
                                <span class="ml-2 text-danger">
                                    <small>{{ $message }}</small>
                                </span>
                            </div>
                        @enderror
                    </div>

                    <div class="mt-10">
                        <input
                            type="password"
                            name="password"
                            placeholder="Password"
                            onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Password'"
                            required=""
                            class="single-input-primary"
                        />
                        @error('password')
                            <div class="mt-1">
                                <span class="ml-2 text-danger">
                                    <small>{{ $message }}</small>
                                </span>
                            </div>
                        @enderror
                    </div>

                    <div class="mt-10">
                        <input
                            type="password"
                            name="password_confirmation"
                            placeholder="Konfirmasi Password"
                            onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Konfirmasi Password'"
                            required=""
                            class="single-input-primary"
                        />
                        @error('password_confirmation')
                            <div class="mt-1">
                                <span class="ml-2 text-danger">
                                    <small>{{ $message }}</small>
                                </span>
                            </div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <p>
                            Sudah punya akun? login
                            <a href="{{ route('user.login') }}" style="color: black">di sini.</a>
                        </p>
                    </div>

                    <div class="mt-10">
                        <button class="genric-btn primary-border float-right">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
