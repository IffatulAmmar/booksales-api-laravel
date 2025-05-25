<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request){
        // setup validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
        //cek validator
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'data' => $validator->errors()
            ], 422);
        }

        //create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        //cek keberhasilan
        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'User Created',
                'data' => $user
            ], 200);
        }
        //cek gagal
        return response()->json([
            'success' => false,
            'message' => 'User Failed to Create',
            'data' => $user
        ], 409);

    }

    public function login(Request $request){
        //validator
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);
        //cek validator
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'data' => $validator->errors()
            ], 422);
        }
        //cek kredensial
        $credentials = $request->only('email', 'password');
        //cek isfail
        if (!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 401);
        }

        //cek berhasil
        return response()->json([
            'success' => true,
            'message' => 'User Logged In',
            'user' => auth()->guard('api')->user(),
            'token' => $token,
            'data' => $token
        ],200);

    }
    public function logout()
{
    try {
        // Ambil token dari request header
        $token = JWTAuth::getToken();

        if (!$token) {
            return response()->json([
                'success' => false,
                'message' => 'Token not provided',
            ], 400);
        }

        // Invalidate token
        JWTAuth::invalidate($token);

        return response()->json([
            'success' => true,
            'message' => 'User logged out successfully',
        ], 200);

    } catch (JWTException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Logout failed, please try again',
        ], 500);
    }
}
}
