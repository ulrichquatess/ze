@extends('layouts.reg.app')

@section('content')

    <div class="d-flex justify-content-center h-100">
        <div class="user_card">
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                    <img src="https://cdn.freebiesupply.com/logos/large/2x/pinterest-circle-logo-png-transparent.png" width="80px" height="80px" class="brand_logo" alt="Logo">
                </div>
            </div>
            <div class="d-flex justify-content-center form_container">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input id="name" type="text" name="name" class="form-control input_user{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" placeholder="username" required autofocus>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-address-book"></i></span>
                        </div>
                        <input id="email" type="email" name="email" class="form-control input_user{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="email address" required>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input id="password" type="password" name="password" class="form-control input_pass{{ $errors->has('password') ? ' is-invalid' : '' }}" value="" placeholder="password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>


                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input id="password-confirm" type="password" name="password_confirmation" class="form-control input_pass" placeholder="password-confirm" required>
                    </div>

                    <div class="d-flex justify-content-center mt-3 login_container">
                        <button type="submit" name="button" class="btn login_btn">{{ __('Register') }}</button>
                    </div>
                    <div class="d-flex justify-content-center links">
                        Have an account? <a href="{{ route('login') }}" class="ml-2">Sign In</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
