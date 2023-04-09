@extends('layouts.app')

@section('content')
<div class="container">

    <h3><b>{{Auth::user()->name}} Bookmark</b></h3>
    <div class="row">
        @foreach($cafe as $cafe)
        @if($cafe->bookmarks)
        @foreach ($cafe->bookmarks as $bookmark)
        @if ($bookmark->user_id == Auth::user()->id)
        <h1>{{$cafe->title}}</h1>
        @endif
        @endforeach
        @endif
        @endforeach
    </div>
</div>
@endsection
