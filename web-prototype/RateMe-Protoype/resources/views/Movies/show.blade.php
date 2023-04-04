@extends('layouts.app')

@section('content')
    <div class="card">
        <img src="https://i.ytimg.com/vi/jdpg-5fcBwM/maxresdefault.jpg" class="card-image-top">
        <div class="card-bordy p-4">
            <h1>Nomina.Public</h1>
            <div class="text-warning">
                <i class="fas fa-star mb-3"></i>
                <i class="fas fa-star mb-3"></i>
                <i class="fas fa-star mb-3"></i>
                <i class="fas fa-star mb-3"></i>
                <i class="fas fa-star mb-3"></i>
            </div>
            <p>Jl. Kemuning No.17, Merdeka, Kec. Sumur Bandung, Kota Bandung, Jawa Barat 40113</p>
            <h3>Recommended Menu</h3>
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-10">Chicken Nanban</div>
                        <div class="col"><span class="text-warning">Rp 32.000</span></div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-10">Misoyaki Chicken</div>
                        <div class="col"><span class="text-warning">Rp 32.000</span></div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-10">Aburi Beef Curry</div>
                        <div class="col"><span class="text-warning">Rp 32.000</span></div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-10">Ice Regal</div>
                        <div class="col"><span class="text-warning">Rp 25.000</span></div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-10">Peach Tea</div>
                        <div class="col"><span class="text-warning">Rp 18.000</span></div>
                    </div>
                </li>
            </ul>

            <h3 class="comment mt-4">Comments</h3>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <b>Albert : </b>website nya bagus, ehh maksudnya cafenya
                </li>
                <form action="#" method="post">

                </form>
            </ul>
            <form action="#" method="POST">
                <input type="text" class="form-control mt-3" placeholder="Add a comment">
                <button type="submit" class="btn btn-primary mt-3 float-right">Comment</button>
            </form>
        </div>
    </div>

@endsection
