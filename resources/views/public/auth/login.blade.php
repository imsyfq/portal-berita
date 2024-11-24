@extends('public.auth.layout')
@section('title', 'Login')
@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh; width: 100%">
        <div class="card" style="max-width: 400px">
            <div class="card-body">
                <h3>Login</h3>
                <p>Selamat datang, harap login untuk melanjutkan.</p>

                <form action="{{ route('user.login') }}" method="POST">
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

                    <div class="mt-3">
                        <p>
                            Tidak punya akun? register
                            <a href="{{ route('user.register') }}" style="color: black">di sini.</a>
                        </p>
                    </div>

                    <div class="mt-10">
                        <button class="genric-btn primary-border float-right">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
