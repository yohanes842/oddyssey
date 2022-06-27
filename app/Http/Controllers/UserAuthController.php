<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\HasApiTokens;

class UserAuthController extends Controller
{
    use HasApiTokens;

    public function register(Request $request){
        //validasi & create paling tan copas dari yang di register di userController

        // $user = User::create([]);
        // $token = $user->createToken('API Token')->accessToken;

        // return response([
        //     'message'=>'success', 
        //     'data' => $user,
        //     'access_token' => $token,
        // ], 200);
    }

    public function login(Request $request){
        //validasi & create paling tan copas dari yang di register di userController

        // $token = auth()->user()->createToken('API Token')->accessToken;
        
        // return response([
        //     'message'=>'success', 
        //     'data' => auth()->user(),
        //     'access_token' => $token,
        // ], 200);
    }
}
