<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $user=User::where('email',$request->email)->first();
        if(!$user || !Hash::check($request->password,$user->password)){
            return response([
                'message'=>'The provided credentials are incorrect.'
            ]);

        }
        $token=$user->createToken('my-app-token')->plainTextToken;
        $name=$user->name;
        $email=$user->email;
   return response()->json([
     'token'=>$token,
       'name'=>$name,
       'email'=>$email



   ]);








    }
    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required'
        ]);
        return response()->json('Successfully Registered');
    }
    public function logout(Request $request){
     $token=$request->header('token');
     $tokenArray=explode('|',$token);
     $tokenid=$tokenArray[0];
        DB::table('personal_access_tokens')->where('id',$tokenid)->delete();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
    //
}
