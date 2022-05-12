<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function create(){
        return view('register');
    }

    public function store(Request $request){
        $validation = Validator::make($request->all(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
                'confirm_password' => 'required|same:password'
            ]
        );

        if($validation->fails()){
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validation);
        }

        // User::create([
        //     'name' => $request->name,
        //     'user_type' => 'member',
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'create_at' => now(),
        //     'updated_at' => now(),
        // ]);
        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->user_type = 'member';
        $newUser->email = $request->email;
        $newUser->password = Hash::make($request->password);
        $newUser->created_at = now();
        $newUser->uploaded_at = now();
        $newUser->save();    
        

        return redirect('/login')->with('register_success', '<b>Registration successful!</b> Please login to your account!');
    }
}
