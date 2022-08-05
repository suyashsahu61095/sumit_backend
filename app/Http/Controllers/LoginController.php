<?php

namespace App\Http\Controllers;
use App\User;
use App\StaffOtp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class LoginController extends Controller
{
        public function authenticate(Request $request)
        {
            $credentials = $request->only('email', 'password');
               try {
                    if (! $token = JWTAuth::attempt($credentials)) {
                        return response()->json(['error' => 'invalid_credentials'], 400);
                    }
                } catch (JWTException $e) {
                    return response()->json(['error' => 'could_not_create_token'], 500);
                }
    
            return response()->json(compact('token'));
        }

        public function logout(Request $request){
            auth()->logout();
            return response()->json(['message'=> 'Successfully Logged Out']);
        }
}
