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
    <form method="POST" action="{{ route($passwordEmailRoute) }}">
        @csrf

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif


        <div class="input-group mb-3">
            <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input id="email" type="email" name="email" class="form-control input_user{{ $errors->has('email') ? ' is-invalid' : '' }}" value="" placeholder="useremail">
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
        </div>


        <div class="d-flex justify-content-center mt-3 login_container">
            <button type="submit" name="button" class="btn login_btn">{{ __('Send Password Reset Link') }}</button>
        </div>

        <div class="d-flex justify-content-center links">
            Don't have an account? <a href="{{ route('register') }}" class="ml-2">Sign Up</a>
        </div>

    </form>
            </div>
        </div>
    </div>

@endsection
