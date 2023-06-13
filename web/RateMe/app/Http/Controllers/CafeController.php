<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use App\Models\Menu;
use Illuminate\Http\Request;

class CafeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request) {
            $cafe = cafe::where('title', 'like', '%' . $request->search . '%')->get();
        } else {
            $cafe = cafe::all();
        }

        if (request()->segment(1) == 'api') return response()->json([
            "error" => false,
            "list" => $cafe,
        ]);

        // return view('cafe.index', ['list' => $cafe]);
        return view('cafe.index', compact('cafe'));
    }

    public function search(Request $request)
    {
        $request->validate(['cafe_name' => 'required']);

        if ($request) {
            $cafe = cafe::where('title', 'like', '%' . $request->cafe_name . '%')->get();
        }

        if (request()->segment(1) == 'api') return response()->json([
            "error" => false,
            "list" => $cafe,
        ]);

        // return view('cafe.index', ['list' => $cafe]);
        return view('cafe.index', compact('cafe'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cafe.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'rating_star' => 'required',
            'description' => 'required'
        ]);

        $cafe = Cafe::create($request->all());

        if (request()->segment(1) == 'api') return response()->json([
            "error" => false,
            "message" => 'tambah berhasil',
        ]);

        return redirect()->route('cafe.show', $cafe->id);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cafe = Cafe::find($id);
        return view('cafe.show', compact('cafe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cafe $cafe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cafe $cafe)
    {
    }

    public function cafe_menu_store(Request $request, Cafe $cafe)
    {
        // $request->validate([
        //     'menu'=> 'required',
        //     'harga' => 'required'
        // ]);
        // $cafe->newmenu()->attach(['role'=> $request->menu]);
        // return back();
    }

    public function cafe_menu_destroy(Cafe $cafe, Menu $menu)
    {
        $cafe->menu()->detach($menu->id);
        return back();
    }
}
