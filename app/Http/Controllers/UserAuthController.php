<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\HasApiTokens;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class UserAuthController extends Controller
{
    use HasApiTokens;

    public function register(Request $request){
        $data = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        if($data->fails()) return response(['error' => $data->errors()]);

        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->role_id = 2;
        $newUser->email = $request->email;
        $newUser->password = Hash::make($request->password);
        $newUser->created_at = now();
        $newUser->updated_at = now();
        $newUser->save();    
        $token = $newUser->createToken('API Token')->accessToken;

        return response([
            'message'=>'success', 
            'user' => $newUser,
            'access_token' => $token,
        ], 200);
    }

    public function login(Request $request){
        $data = Validator::make($request->all(), [
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if($data->fails()) return response(['error' => $data->errors()]);

        if (!auth()->attempt($request->only(['email', 'password']))) return response (['error'=>'Invalid Credentials'], 403);
        
        $token = auth()->user()->createToken('API Token')->accessToken;
        
        return response([
            'message'=>'success', 
            'user' => auth()->user(),
            'access_token' => $token,
        ], 200);
    }

    public function getTrans(Request $request){
        $trans = Transaction::with('game')->where('user_id', $request->user()->id)->get();

        return response(['message'=>'Success', 'data'=>$trans]);
    }
}
