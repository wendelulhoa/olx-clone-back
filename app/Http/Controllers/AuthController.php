<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('apiJwt', ['except' => ['login']]);
    }
    public function login(Request $request)
    {
        $email    = $request['email'];
        $password = $request['password'];
        $auth = Auth::guard('api')->attempt(['email' => $email, 'password' => $password]);
        if (!$token = $auth) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function refresh()
    {
        return $this->respondWithToken(Auth::guard('api')->refresh());
    }

    public function me()
    {

        return response()->json(auth()->guard('api')->user());
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => Auth::guard('api')->factory()->getTTL() * 60
        ]);
    }
}
