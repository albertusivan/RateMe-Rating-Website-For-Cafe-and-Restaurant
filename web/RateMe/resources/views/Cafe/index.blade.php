@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h1 class="mb-4 text-center"><b>Cafe and Resto</b>
        @if (Auth::user())
        @if (Auth::user()->admin == 1)
            <a href="{{ route('cafe.create')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></a>
        @endif
        @endif
    </h1>

    <div class="row justify-content-center mb-4">
        <div class="col-md-6">
            <form action="/cafe">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" name="search">
                    <button class="btn btn-secondary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    <div id="carouselExampleCaptions" class="carousel slide shadow mb-4" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="3000">
                <img src="https://lh3.googleusercontent.com/pw/AMWts8BZ8EFtI7B9tqrAI5AcxnwNa_9rpoxzT4BlP5cdwqKj9jlV-P1CtF_uZUYVQSdFPuARLBpUM4yCXcItppc_B6nrPF41JfLezKXMKDKbj0nTmlqSy4akckjAlQQXb-p4uq5YmHmfkEdOtn3l83jM8T7K=w1280-h500-s-no?authuser=0" class="d-block w-100" alt="Responsive image" height="500px" >
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="https://lh3.googleusercontent.com/pw/AMWts8AH_bInKdfE4KcQvyPm6YD5Y0B-JB_dfIvt6rIwbaX8FCQD3czcdguImfNMUp85QXX3hCEQpoAbo-bIetY55hU9Ik_x4KboTtxCMheDbRB6JWSHdpj1Gx3nnDarRdQlU1d6_cBV1m_JTNDBkM6qAzmK=w1280-h500-s-no?authuser=0" class="d-block w-100" alt="Responsive image" height="500px" >
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="https://lh3.googleusercontent.com/pw/AMWts8BJcsYn2vXOr5XA0yQRnAZ3h-lBZD8G_2RQNxOD_zt_eOBoUrN866snliqFecnymYbfuGbHX0OqnAQs9813n0uvhPJ0mZOCz2dYOoXrvtbmqjb6B043RlIfFXTS0w73ix22wkOCu37KzqfEVynEI_KZ=w1280-h500-s-no?authuser=0" class="d-block w-100" alt="Responsive image" height="500px">
                <div class="carousel-caption d-none d-md-block">
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


    <h3><b>List Cafe and Restaurant</b></h3>
    <div class="row">
        @if (count($cafe))
            @foreach($cafe as $cafe)
                <div class="col-md-4 mt-4">
                    <div class="card  shadow" >
                        <div class="bg-image">
                            <img src="{{$cafe->image}}" class="rounded w-100" />
                            <div class="mask" style="background-color: hsla(0, 0%, 0%, 0.55)"></div>
                        </div>
                        <div class="card-body">
                            <h3>{{$cafe->title}}</h3>
                            <div class="text-warning mb-2">
                            <b>{{$cafe->rating_star}} </b><i class="fas fa-star"></i>
                            </div>
                            <p>
                                {{ $cafe->description}}
                            </p>
                            <a href="/cafe/{{$cafe->id}}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
        <div class="container mt-5 mb-5">
        <h5 class="mt-4 mb-3 text-center"><b>Cafe or Restaurant not found!</b></h5>
        </div>
        @endif
    </div>


</div>

<footer class="text-center text-white mt-4" style="background-color: #7C6354;" >
    <!-- Grid container -->
    <div class="container "></div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0);">
        <h6>Rifqy Muhammad Alfian - Sawsan Setiady - Regita Indri Cahyani - Albertus Ivan Martino - Muhamad Farhan Wirasantoso</h6>
    </div>
    <!-- Copyright -->
</footer>
@endsection
