<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class UserController extends Controller
{
    //login
    public function login(Request $request)
    {
    }

    //register
    public function register()
    {
        // $validator = Validator::make($request->all(), []);
    }
}
