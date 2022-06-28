<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\HasApiTokens;

class UserAuthController extends Controller
{
    use HasApiTokens;

    public function register(Request $request){
        //validasi & create paling tan copas dari yang di register di userController
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);
   
        // $data['password']=bcrypt($request->password);

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
            'data' => $newUser,
            'access_token' => $token,
        ], 200);
    }

    public function login(Request $request){
        //validasi & create paling tan copas dari yang di register di userController
        $data = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (!auth()->attempt($data)) return response (['error'=>'Invalid Credentials'], 403);
        
        $token = auth()->user()->createToken('API Token')->accessToken;
        
        return response([
            'message'=>'success', 
            'data' => auth()->user(),
            'token'=>auth()->user()->token_get_all,
            'access_token' => $token,
        ], 200);
    }

    public function getTrans(Request $request){
        $id = $request->user()->id;
        
        $trans = Transaction::with('game')->where('user_id', $id)->get();

        return response(['message'=>'Success', 'data'=>$trans]);
    }
}
