<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
            'gender' => 'required',
            'phone' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Please insert all fields',
                'errors' => $validator->errors()->toArray(),
                'code' => 400
            ]);
        }

        $data = $validator->validated();
        $data['password'] = Hash::make($data['password']); //encrypt the password
        $data['role'] = 'user'; // Set the default value for the role

        $user = User::create($data);

        if ($user) {
            return response()->json([
                'message' => 'Registered Successfully',
                'code' => 200
            ]);
        } else {
            return response()->json([
                'message' => 'Register Failed',
                'code' => 100
            ]);
        }
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(!Auth::attempt($request->only('email','password'))){
            return response()->json([
                'message' => 'Incorrect Email or Password',
                'code' => 400

            ]);
        }else{
            $user = $request->user();
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json([
                'user' => $user,
                'token' => $token
            ]);
        }
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return response()->json([
            'message' => 'Logged out'
        ]);
    }
}
