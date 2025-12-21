<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ================= REGISTER =================
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'Register berhasil'
        ], 201);
    }

    // ================= LOGIN (JWT) =================
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // JWT login
        if (! $token = auth()->attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
        ]);
    }

    // ================= ME =================
    public function me()
    {
        // user diambil dari JWT middleware
        return response()->json(auth()->user());
    }

    // ================= LOGOUT =================
    public function logout()
    {
        auth()->logout();

        return response()->json([
            'message' => 'Logout berhasil'
        ]);
    }
}
