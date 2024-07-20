<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class AuthenticationController extends Controller
{
    //
    public function register(RegisterRequest $request){
        $validatedData = $request->validated();   
        $user = User::create($validatedData);

        if(empty($user)){
            return response()->json([
                'success' => false,
                'message' => 'User created fail',
            ]);
    
        } else{
            $token = $user->createToken('auth_token')->plainTextToken;
            
            return response()->json([
                'success'       => true,
                'message'       => "Register success",
                'data'          => $user,
                'access_token'  => $token,
                'token_type'    => 'Bearer'
            ]); 
        }   

    }
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email'     => 'required|string|max:255',
            'password'  => 'required|string'
          ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
            }
        $credentials    =   $request->only('email', 'password');

        if (! Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'User not found'
            ], 401);
        }
        $user   = User::where('email', $request->email)->firstOrFail();
        $token  = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message'       => 'Login success',
            'access_token'  => $token,
            'token_type'    => 'Bearer'
        ]);

    }
    public function logout(){
        Auth::user()->tokens()->delete();
        return response()->json([
            'message' => 'Logout successfull'
        ]);
    }
}
