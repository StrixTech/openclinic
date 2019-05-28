@extends('layouts.app')

@section('content')
        <div id="primary" class="p-t-b-100 height-full">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mx-md-auto paper-card">
                        <div class="text-center">
                            <img src="img/dummy/u4.png" alt="">
                            <h3 class="mt-2">Welcome to openClinic</h3>
                            <p class="p-t-b-20">
                                Look who's back! Sign in to access openClinic
                            </p>
                        </div>
                        <form method="POST" action="{{ route('login') }}" autocomplete="off">
                            @csrf

                            <div class="form-group has-icon"><i class="icon-envelope-o"></i>
                                <input id="email" type="text" class="form-control form-control-lg @error('email') is-invalid @enderror"
                                       placeholder="Email Address" required name="email">
                            </div>
                            <div class="form-group has-icon"><i class="icon-user-secret"></i>
                                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                                       placeholder="Password" required name="password">
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Log In">
                                </div>
                                <div class="col-lg-6">
                                    <a href="{{ route('register') }}" class="btn btn-primary btn-lg btn-block">Register</a>
                                </div>
                            </div>

                            <a href="{{ route('password.request') }}" class="forget-pass pt-2 position-absolute">Have you forgot your username or password ?</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
