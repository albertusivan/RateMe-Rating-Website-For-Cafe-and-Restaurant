@extends('layouts.app')

@section('content')

<div class="container-1320px">
    <div class="row">
        <div class="col-md-4 content-center" style="text-align:center; vertical-align: middle; background-color:rgba(227, 233, 194, 1); padding: 100px">
            <!-- <div class="container text-center" style="padding: 100px"> -->
                <h1>Rate Me</h1>
                logo
            <!-- </div> -->
        </div>

        <div class="col-md-8 border">
            <!-- <div class="row justify-content-center border" style="text-align:left; white-space:normal">buat tulisan login button</div> -->
            
            <div class="row border">
                <h5 style="text-align:center; vertical-align: middle">Login to your account</h5>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf


                        <div class="row">
                            <label for="email" class="col-md-10" style="text-align:center; vertical-align: middle; padding-right:40px">{{ __('Email Address') }}</label>
                        </div>
                        <div class="row" style="margin-bottom: 20px">
                            <div class="col-md-4"></div>
                            <div class="col-md-4 col-form-label text-md-end">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <label for="password" class="col-md-10" style="text-align:center; vertical-align: middle; padding-right:70px">{{ __('Password') }}</label>
                        </div>
                        <div class="row" style="margin-bottom: 10px">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row" style="margin-bottom: 20px">
                            <div class="col-md-6 offset-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="text-align:center; vertical-align: middle">
                            <div class="col-md-12" style="">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <!-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif -->
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection
