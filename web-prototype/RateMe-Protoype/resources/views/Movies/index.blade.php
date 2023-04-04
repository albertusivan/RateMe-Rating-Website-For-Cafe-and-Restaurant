@extends('layouts.app')

@section('content')
    <h1>Cafe and Resto
        <a href="{{ route('movies.create')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></a>
    </h1>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="3000">
      <img src="https://i.ytimg.com/vi/jdpg-5fcBwM/maxresdefault.jpg" class="d-block w-100" alt="Responsive image" height="500px" >
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="3000">
      <img src="https://lh3.googleusercontent.com/pw/AMWts8CIUIZJNw8dHPU7fIR-BlB-eMSV_voaqkLL3bSw7EexpPV8u1Qs2fEWEjZeo57ma3fPGKLmbb5UsT3g-ZSILIW4lSWdxD2RX5bWKIrBwE5XipmoMxJIcTLEI3Gs1BG-t8ZHsjKpX7jILIorPg_BL1Y=w1280-h720-s-no?authuser=0" class="d-block w-100" alt="Responsive image" height="500px">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="3000">
      <img src="https://lh3.googleusercontent.com/pw/AMWts8AqRi_80hGlEFq_w3qRWypQGtInnhWkzt5oCohgnB2NpJWO3F_NUD-8jkGB-d-xuOczwCb5Xcfbr_mioPOGButJIn8t_W-nCc2zNFlZhx-1AW2mSET7zTyxGop8TlcJwk378Blt_qyIBzST8eEQXT0=w1280-h720-s-no?authuser=0" class="d-block w-100" alt="Responsive image" height="500px">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

    <div class="row">
        @foreach($movies as $movie)
        <div class="col-md-4 mt-4">
            <div class="card">
                <img src="{{$movie->image}}" class="bg-image" >
                <div class="mask" style="background-color: rgba(0, 0, 0, 0.5)"></div>
                <div class="card-body">
                    <h3>{{$movie->title}}</h3>
                    <div class="text-warning mb-2">
                    <b>{{$movie->rating_star}} </b><i class="fas fa-star"></i>
                    </div>
                    <p>
                        {{ $movie->description}}
                    </p>
                    <a href="/movies/{{$movie->id}}" class="stretched-link"></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
