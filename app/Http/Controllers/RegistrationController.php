<?php

namespace App\Http\Controllers;

use App\Registration;
use Request;
use Validator;
use Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class RegistrationController extends Controller
{

    public function getRegisteredUsers(){
        $users = new Registration();
        $userData = $users::orderby('created_at','DESC')->get();
         return response()->json(compact('userData'));
    }    

    public function register(Request $request){
        $validator = Validator::make($request::all(), [
            'full_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mobile'=> 'required|max:10',
            'email' => 'required|email',
            'address' => 'required',
        ]);
          if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
            }    
            $full_name = request::Input('full_name'); 
            $father_name = request::Input('father_name'); 
            $mobile = request::Input('mobile'); 
            $email = request::Input('email'); 
            $address = request::Input('address'); 
            $userData = new Registration();
            $userData->full_name = $full_name;
            $userData->father_name = $father_name;
            $userData->mobile = $mobile;
            $userData->email = $email;
            $userData->address = $address;
            if($userData->save()){
                $msg ="Successfully Registered";
                return response()->json(compact('msg'),200);   
            }else{
                $msg = "Failed please try again later";
                return response()->json(compact('msg'),500); 
            }
          
    }

    public function getRegisteredUserById(Request $request){
        $validator = Validator::make($request::all(), [
            'id' => 'required',
        ]);
          if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
            }  
       
        if( $user = Registration::find(request::Input('id'))){
            $userData = $user::where('id',request::Input('id'))->first();
            return response()->json(compact('userData'));
        }else{
            $msg = "Failed please try again later";
            return response()->json(compact('msg'),500); 
        }
       
        }    


    public function UpdateRegister(Request $request){

        $updateRegister = Registration::find(request::Input('id'));
         if(is_null($updateRegister)) {
            return response()->json(['message' => 'User not Found'],404);
         }
         $id = request::Input('id'); 
         $full_name = request::Input('full_name'); 
         $father_name = request::Input('father_name'); 
         $mobile = request::Input('mobile'); 
         $email = request::Input('email'); 
         $address = request::Input('address');

        $updateRegister->full_name = $full_name;
        $updateRegister->father_name = $father_name;
        $updateRegister->mobile = $mobile;
        $updateRegister->email = $email;
        $updateRegister->address = $address;
        $updateRegister->update();
        $msg ="Successfully Updated";
        return response()->json(compact('msg'),200);  
    }

    public function DeleteRegister(Request $request){
        $deleteReg = Registration::find(request::Input('id'));
        if(is_null($deleteReg)) {
            return response()->json(['message' => 'User not Found'],404);
         }
         $deleteReg->delete();
         $msg ="Successfully Deleted";
         return response()->json(compact('msg'),200);  
    }




}
