<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','string','email','max:255','unique:users'],
            'password' => ['required','string','min:8','confirmed'],
        ]);

        $user = User::create($data);

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'access_token' => $token,
            'user' => $user,
        ];
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required','string','email','exists:users'],
            'password' => ['required','string','min:8'],
        ]);

        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash($data['password'], $user->password)) {
            return response([
                'message' => 'Bad Credentials',
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'access_token' => $token,
            'user' => $user,
        ];
    }
}
