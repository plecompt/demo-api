<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController
{
    // Get session token for given user
    public function login(Request $request)
    {
        // Checking if request contains a valid email and password
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required' 
        ]);

        // Checking in users table if email exist, hash the password of the request and compare hashed password
        // If hashes match, return a session token
        if (Auth::attempt($credentials)) {
            $token = $request->user()->createToken('auth-token')->plainTextToken;
            return response()->json(['token' => $token]);
        }

        return response()->json(['error' => 'Invalid credentials'], 401);
    }

}
