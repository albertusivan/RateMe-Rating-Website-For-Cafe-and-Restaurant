@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <img src="{{$cafe->image}}" class="rounded w-100">
        <div class="card-bordy p-4">
            <div class="row">
                <div class="col-md-auto">
                    <h2>{{$cafe->title}}</h2>
                </div>
                <div class="col-md-auto mt-1">
                    @php
                    $id = $cafe->id;
                    $data = DB::table('ratings')->where('cafe_id' , $id)->pluck('rating');
                    $sum = 0;
                    $count = 0;
                    @endphp

                    @foreach ($data as $item)
                    @php
                    $sum += $item;
                    $count++;
                    @endphp
                    @endforeach

                    @php
                    $avg = ($count > 0)? $sum/$count : 0;
                    $format_avg = number_format($avg, 1);
                    @endphp

                    <div class="text-warning mb-2">
                        <h4><b>{{$format_avg}} </b><i class="fas fa-star"></i></h4>
                    </div>
                </div>
                <div class="col-md-auto">
                    @if (Auth::user())
                    @if (Auth::user()->admin == 0)
                    @php
                    $v = true
                    @endphp

                    @if (count($cafe->bookmarks))
                    @foreach ($cafe->bookmarks as $bookmark)
                    @if ($bookmark->user_id == Auth::user()->id)
                    @if ($bookmark->cafe_id == $cafe->id)
                    @php
                    $v = false
                    @endphp
                    @endif
                    @endif
                    @endforeach
                    @endif
                    @if ($v)
                    <form action="{{ route('cafe.bookmark.store', $cafe->id) }}" method="POST">
                        @csrf
                        <span>
                            <button type="submit" class="btn btn-danger btn-sm">
                                <b> Bookmark </b>
                                <i class="add-menu fas fa-heart"></i>
                            </button>
                        </span>
                    </form>
                    @else
                    <form action="{{ route('bookmark.destroy', $bookmark->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <b>Hapus Bookmark </b>
                            <i class="add-menu fas fa-minus"></i>
                        </button>
                    </form>
                    @endif
                    @endif
                    @endif
                </div>
                <div class="col">
                    @if (Auth::user())
                    @if (Auth::user()->admin == 0)
                    @php
                    $f = true
                    @endphp

                    @if (count($cafe->ratings))
                    @foreach ($cafe->ratings as $rating)
                    @if ($rating->user_id == Auth::user()->id)
                    @if ($rating->cafe_id == $cafe->id)
                    @php
                    $f = false
                    @endphp

                    @endif
                    @endif
                    @endforeach
                    @endif
                    @if ($f)
                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ratingmodal">
                        <b>Rating </b><i class="add-menu fas fa-plus"></i>
                    </button>
                    @else
                    <h4><b>Your Rating : {{$rating->rating}}</b></h4>
                    @endif
                    @endif
                    @endif
                </div>
            </div>
            <p>{{ $cafe->description}}</p>
            <h3>Recommended Menu
                @if (Auth::user())
                @if (Auth::user()->admin == 1)
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="add-menu fas fa-plus"></i>
                </button>
                @endif
                @endif
            </h3>
            <ul class="list-group list-group-flush">
                @if (count($cafe->menus))
                <ul class="list-group">
                    @foreach ($cafe->menus as $menu)
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-10">{{$menu->name}} </div>
                            <div class="col"><span class="text">Rp.{{ $menu->harga }}</span></div>
                        </div>
                        @if (Auth::user())
                        @if (Auth::user()->admin==1)
                        <form action="{{ route('menu.destroy', $menu->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-link text-danger">Delete</button>
                        </form>
                        @endif
                        @endif
                    </li>
                    @endforeach
                </ul>
                @else
                <h6 class="mt-4 mb-3">No Recommended Menu Yet!</h6>
                @endif
            </ul>


            <h3 class="comment mt-4">Comments</h3>
            <ul class="list-group list-group-flush">
                @if (count($cafe->comments))
                @foreach ($cafe->comments as $comment)
                <li class="list-group-item">
                    <b>{{$comment->user->name}} : </b>{{ $comment->content }}
                    @if (Auth::user())
                    @if ($comment->user_id == Auth::user()->id or Auth::user()->admin == 1)
                    <form action="{{ route('comments.destroy', $comment->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-link text-danger">Delete</button>
                    </form>
                    @endif
                    @endif
                </li>
                @endforeach
                @else
                <h6 class="mt-4 mb-3">No Comments!</h6>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Add Recomended Menu</h1>
                        <form action="{{ route('cafe.menu.store', $cafe->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Menu</label>
                                <input type="text" class="form-control" name="menu"></input>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" class="form-control" name="price"></input>
                            </div>
                            <p></p>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ratingmodal" tabindex="-1" aria-labelledby="ratingmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ratingmodalLabel">Add Rating</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Add Rating Menu</h1>
                        <form action="{{ route('cafe.rating.store', $cafe->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Rating</label>
                                <input type="number" min="0" max="5" class="form-control" name="rating" placeholder="Range 0 until 5"></input>
                            </div>
                            <p></p>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
