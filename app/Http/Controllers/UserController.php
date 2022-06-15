<?php

namespace App\Http\Controllers;
use App\User;
use App\Document;
use Request;
use Validator;
use Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
    public function getRegisteredUsers(){

           $users = new User();
           $userData = $users::orderby('created_at','DESC')->get();
            return response()->json(compact('userData'));
    }    

}
