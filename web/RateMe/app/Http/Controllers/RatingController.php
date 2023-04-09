<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Cafe;

class RatingController extends Controller
{
    public function updateCafeRating($cafeId)
    {
        $data = DB::table('ratings')->where('cafe_id', $cafeId)->pluck('rating');
        $sum = 0;
        $count = 0;
        foreach ($data as $item) {
            $sum += $item;
            $count++;
        }
        $avg = ($count > 0) ? $sum / $count : 0;
        DB::table('cafes')->where('id', $cafeId)->update(['avg_rating' => $avg]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Cafe $cafe)
    {
        $request->validate(['rating' => 'required']);
        // Comment::create($request->comment);

        Rating::create([
            'user_id' => Auth::user()->id,
            'cafe_id' => $cafe->id,
            'rating' => $request->rating
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
