<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if(!Auth::attempt($request->only(['email', 'password']))){
            return response()->json(['error' => 'Неправильные данные'], 401);
        }

        $user = $request->user();

        $token = $user->createToken('user_token')->plainTextToken;

        return response()->json(['name' => $user->name, 'token' => $token], 200);
    }

    public function logout(Request $request)
    {
        if($request->user()){
            $request->user()->tokens()->delete();
        }

        return response()->json(['success' => 'Пользователь успешно вышел'], 200);
    }
}
