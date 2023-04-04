@extends('layouts.app')

<section class="vh-100" style="background-color: #FFFFFF;">
@section('content')
  <div class="container py-5 h-90">
    <div class="row d-flex justify-content-center align-items-center h-90">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="https://i.pinimg.com/564x/df/f5/27/dff5273e59d9eee1b5e6143dd9fd946b.jpg"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-5  p-lg-5 text-black">

                <form method="POST" action="{{ route('register') }}">
                @csrf
                  <div class="d-flex align-items-center mb-2 pb-1">
                    <span >
                        <img src="https://lh3.googleusercontent.com/pw/AMWts8BrOkWjjdFWykeMPyQcRb5pUKNWhn3l8Ap7zBxUo2J6THtBJevWFKYXIvzB8jG2nVY9Ex59kaC5yXEMuFdekf2mizDvqjZtiaACyzpFufm3GNYXYH_A2PCZfEwTwNYsXBp7A9cNfLkDgZ0e9xXHuHwG=w588-h575-s-no?authuser=0" width="50" height="50">
                    </span>
                    <span class="h1 fw-bold ms-3 mb-0">RateMe</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-" style="letter-spacing: 1px;">Register your account</h5>

                  <div class="form-outline mb-3">
                    <label class="form-label" for="name">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-outline mb-3">
                    <label class="form-label" for="email">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-outline mb-3">
                    <label class="form-label" for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-outline mb-3">
                    <label class="form-label" for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password">
                  </div>

                  <div class="pt-1 mb-3">
                    <button class="btn btn-dark btn-lg btn-block" type="submit">{{ __('Register') }}</button>
                  </div>

                  <p class="mb-0" style="color: #393f81;">Already have an account?
                  <a href="{{ route('login') }}" style="color: #393f81;">Login here</a></p>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
