<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    //register
    public function register(Request $request)
    {
        $attrs = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);

        $users = User::create([
            'name' => $attrs['name'],
            'email' => $attrs['email'],
            'password' => bcrypt($attrs['password'])
        ]);

        if (request()->segment(1) == 'api') return response()->json([
            "error" => false,
            "message" => 'Akun berhasil dibuat',
        ]);
    }

    //login
    public function login(Request $request)
    {
        $attrs = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (!Auth::attempt($attrs)) {
            return response([
                "error" => true,
                'message' => 'Invalid credentials.'
            ], 403);
        };

        if (request()->segment(1) == 'api') return response()->json([
            "error" => false,
            "message" => 'Akun berhasil dibuat',
        ]);
    }

    //logout
}
