<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cafe;

class BookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $request->validate(['user_id' => 'required']);

        if ($request) {
            $cafe = Bookmark::where('user_id', '=', $request->user_id)->get();
        }

        if (request()->segment(1) == 'api') return response()->json([
            "error" => false,
            "list" => $cafe,
        ]);

        // return view('cafe.index', ['list' => $cafe]);
        return view('cafe.index', compact('cafe'));
    }

    public function create(Request $request)
    {
        $attrs = $request->validate([
            'user_id' => 'required',
            'cafe_id' => 'required',
        ]);

        Bookmark::create([
            'user_id' => $attrs['user_id'],
            'cafe_id' => $attrs['cafe_id'],
        ]);

        if (request()->segment(1) == 'api') return response()->json([
            "error" => false,
            "message" => 'bookmark added',
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bookmark $bookmark)
    {
        $bookmark->delete();
        return back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Cafe $cafe)
    {
        Bookmark::create([
            'user_id' => Auth::user()->id,
            'cafe_id' => $cafe->id,
        ]);

        if (request()->segment(1) == 'api') return response()->json([
            "error" => false,
            "message" => 'tambah berhasil',
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Bookmark $bookmark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bookmark $bookmark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bookmark $bookmark)
    {
        //
    }
}
