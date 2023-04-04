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

                <form method="POST" action="{{route('cafe.store')}}">
                @csrf
                  <div class="d-flex align-items-center mb-2 pb-1">
                    <span class="h1 fw-bold mb-0">Add Cafe or Restaurant</span>
                  </div>

                  <div class="form-outline mb-3">
                    <label class="form-label" for="title">Name Cafe or Restaurant</label>
                    <input id="title" type="text" class="form-control form-control-lg" name="title">
                    <!-- @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror -->
                  </div>

                  <div class="form-outline mb-3">
                    <label class="form-label" for="address">Address</label>
                    <input id="address" type="text" class="form-control form-control-lg" name="description">
                  </div>

                  <div class="form-outline mb-3">
                    <label class="form-label" for="Rating">Rating</label>
                    <input id="Rating" type="number" step="0.1" min="0" max="5" class="form-control form-control-lg" name="rating_star">
                  </div>

                  <div class="form-outline mb-3">
                    <label class="form-label" for="image">Image Link</label>
                    <textarea class="form-control form-control-lg" type="url" id="image" rows="3" name="image">
                    </textarea>
                  </div>

                  <div class="pt-1 mb-3">
                    <button class="btn btn-dark btn-lg btn-block" type="submit">Submit</button>
                  </div>

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
