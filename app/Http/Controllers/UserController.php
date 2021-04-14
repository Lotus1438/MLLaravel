<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required',
            'email' => 'required|email'
        ]);

        if ($validator ->fails()) {
            return response()->json(['status_code'=>400, 'message'=>'Bad Request']);

        }else
        {
            $user= User::where('email', $request->email)->first();
        // print_r($data);
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }

             $token = $user->createToken('my-app-token')->plainTextToken;

            $response = [
                'message' => ['Login Succesfully!'],
                'token' => $token,
            ];

            return response($response, 201);
        }

    }
}
