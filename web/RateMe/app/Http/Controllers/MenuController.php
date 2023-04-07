<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cafe;

class MenuController extends Controller
{
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

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return back();
    }

    public function delete(Menu $menu)
    {
        $menu->delete();
        return back();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Cafe $cafe)
    {
        $request->validate([
            'menu'=> 'required',
            'price' => 'required'
        ]);

        Menu::create([
            'cafe_id' =>$cafe->id,
            'name' => $request->menu,
            'harga' => $request->price
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        // $cafes = Menu::all();
        // return view('menu.show', compact('menu', 'cafes'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

}
