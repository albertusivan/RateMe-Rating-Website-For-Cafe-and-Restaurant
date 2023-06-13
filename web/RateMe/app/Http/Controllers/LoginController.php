<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    function index(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
        if (request()->segment(1) == 'api') return response()->json([
            "error" => false,
            "user" => $this,
        ]);
    }
}
