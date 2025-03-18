<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use GuzzleHttp\Psr7\Response;

class AuthController extends Controller
{
    public function memberRegistration(Request $request){
        $validation=validator::make($request->all(),[
          'name'=>'required',
          'email'=>'required|email|unique:users',
          'password'=>'required|string|confirmed|min:6',
          'role'=>'required',
          'profile_image'=>'nullable'
        ]);

        if($validation->fails()){
            return response()->json([
                'status'=>false,
                'message'=>'validation error',
                'errors'=>$validation->errors()
            ], 400);
        }

        $profile_image=null;
        if($request->hasFile('profile_image')){
            $profile_image=$request->file('profile_image')->store('profile_images');
        }

        $user=User::create([
            'name'=> $request->name,
            'email'=>$request->email,
            'role'=>$request->role,
            'password'=>Hash::make($request->password),
            'profile_image'=>$profile_image,
        ]);

        $token=$user->createToken('authToken')->plainTextToken;

        return response()->json([
            'status'=>true,
            'message'=>'registration successful',
            'data'=>new UserResource($user),
            'token'=>$token,
        ], 200);
    }

    public function login(Request $request){
        $validation=validator::make($request->all(),[,
            'email'=>'required', 
            'password'=>'required', 
          ]);
  
          if($validation->fails()){
              return response()->json([
                  'status'=>false,
                  'message'=>'validation error',
                  'errors'=>$validation->errors()
              ], 400);
          }

          $user=User::where('email', $request->email)->first();
          if(!$user||!Hash::Check($request->password, $user->password)){
            return response()->json([
                'status'=>false,
                'message'=>'Invalid Credentials',
            ], 400);
          }

          $token=$user->createToken('authToken')->plainTextToken;

          return response()->json([
              'status'=>true,
              'message'=>'Login successful',
              'data'=>new UserResource($user),
              'token'=>$token,
          ], 200);


    }

    public function User(Request $request, $id){
        $user=user::find($id);
        return response()->json([
            'status'=>true,
            'message'=>'User Fetched Successfully',
            'data'=>new UserResource($user)
        ],200);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'status'=>true,
            'message'=>'Logout Successful',
        ],200);
    }
}
