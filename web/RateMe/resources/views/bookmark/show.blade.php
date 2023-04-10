@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h1 class="mb-4 text-center"><b>{{Auth::user()->name}} Bookmark</b></h1>
    <div class="row">
        @php
        $f = true
        @endphp

        @foreach($cafe as $cafe)
        @if($cafe->bookmarks)
        @foreach ($cafe->bookmarks as $bookmark)
        @if ($bookmark->user_id == Auth::user()->id)
        <div class="col-md-3 mt-4">
            <div class="card  shadow">
                <div class="bg-image">
                    <img src="{{$cafe->image}}" class="rounded w-100" />
                    <div class="mask" style="background-color: hsla(0, 0%, 0%, 0.55)"></div>
                </div>
                <div class="card-body">
                    <h3>{{$cafe->title}}</h3>
                    <p>
                        {{ $cafe->description}}
                    </p>
                    <a href="/cafe/{{$cafe->id}}" class="stretched-link"></a>
                </div>
            </div>
        </div>
        @php
        $f = false
        @endphp
        @endif

        @endforeach
        @endif
        @endforeach

        @if($f)
        <div class="container mt-5 mb-5">
            <h5 class="mt-4 mb-3 text-center"><b>No Cafe or Restaurant has been added!</b></h5>
        </div>
        @endif
    </div>
</div>
@endsection