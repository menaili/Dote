<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name'=> 'required|string',
            'email'=> 'required|string|unique:users',
            'password'=> 'required|string|min:8',
        ]);

        $user= new User([
            'name'=> $request->name,
            'email'=>  $request->email,
            'password'=> Hash::make( $request->password),
        ]);
        $user->save();

        return response()->json(['message' => 'Your account has been created!'], 200);


    }



    public function login(Request $request)
    {
         $request->validate([
            'email'=> 'required',
            'password'=> 'required|string',
        ]);

        $crendentials = request(['email', 'password']);

        if(!Auth::attempt($crendentials)){
            return response()->json(['message' => 'Unauthorized!'], 401);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();

        return response()->json(['data' =>[
            'user' => Auth::user(),
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
        ]]);


    }
}
