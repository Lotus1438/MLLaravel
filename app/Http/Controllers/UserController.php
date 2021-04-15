<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{

    function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'password' => 'required',
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
                'message' => 'Login Succesfully!',
                'token' => $token,
            ];
            return response($response, 201);

        }

    }

    public function getUsers()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function logout(User $id)
    {
        $user = Auth::user();
        // $user->currentAccessToken()->delete();

        $user($id)->currentAccessToken()->delete();

        return response()->json([
            'status_code' => 200,
            'message' => 'Token deleted successfully!'
        ]);
    }
}
