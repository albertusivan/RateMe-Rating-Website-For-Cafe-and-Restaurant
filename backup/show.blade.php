@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <img src="{{$cafe->image}}" class="card-image-top">
        <div class="card-bordy p-4">
            <h1>{{$cafe->title}}</h1>
            <div class="text-warning">
                <i class="fas fa-star mb-3"></i>
                <i class="fas fa-star mb-3"></i>
                <i class="fas fa-star mb-3"></i>
                <i class="fas fa-star mb-3"></i>
                <i class="fas fa-star mb-3"></i>
            </div>
            <p>{{ $cafe->description}}</p>
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
                @if (count($cafe->comments))
                    @foreach ($cafe->comments as $comment)
                    <li class="list-group-item">
                        <b>{{$comment->user->name}} : </b>{{ $comment->content }}
                        <form action="{{ route('comments.destroy', $comment->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-link text-danger">Delete</button>
                        </form>
                    </li>
                    @endforeach
                @else
                    No comments!
                @endif
            </ul>
            <form action="{{ route('cafe.comments.store', $cafe->id)}}" method="POST">
                @csrf
                <input type="text" name="comment" class="form-control mt-3" placeholder="Add a comment">
                <button type="submit" class="btn btn-primary mt-3 float-right">Comment</button>
            </form>
        </div>
    </div>
</div>
@endsection
