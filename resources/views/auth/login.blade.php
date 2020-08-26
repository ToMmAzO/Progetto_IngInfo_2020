@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <body data-theme="default" data-layout="fluid" data-sidebar="left" style="overflow-y: hidden">
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">
                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <div class="text-center">
                                        <h1 class="h2">Welcome back,</h1>
                                        <p class="lead">
                                            Sign in to your account to continue
                                        </p>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input
                                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                id="email"
                                                type="email"
                                                name="email"
                                                value="{{ old('email') }}" required
                                                autocomplete="email" autofocus
                                                placeholder="Enter your email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input
                                                class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                id="password"
                                                type="password"
                                                name="password"
                                                placeholder="Enter your password"
                                                required autocomplete="current-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div>
                                            <div class="custom-control custom-checkbox align-items-center">
                                                <input type="checkbox" class="custom-control-input" name="remember"
                                                       id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label for="remember" class="custom-control-label text-small">Remember
                                                    me next time</label>
                                            </div>
                                        </div>

                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-lg btn-primary">Sign in</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
    </body>
@endsection
