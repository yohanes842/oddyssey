<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    //Login
    public function viewLogin(){
        return view('login');
    }

    public function authentication(Request $request){
        $credentials = Validator::make($request->all(),
        [
            'email' => ['required', 'email:dns'],
            'password' => ['required'],
        ]);

        if($credentials->fails()){
            return redirect()
                ->back()
                ->withInput()
                ->withErrors([
                    'login' => '<b>Login Error!</b> The email is not valid',
                ]);
        }

        Auth::setRememberDuration(60*24*2);

        if (Auth::attempt($request->only(['email', 'password']), $request->rememberme)) {
            $users = User::where('email', $request->email)->get()->first();
            
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'))->with('login_success', 'Hi, <b>'.$users->name.'</b>! Welcome to Oddyssey!');
        }
        
        return back()->withErrors([
            'login' => '<b>Login Error!</b> The email and password do not match!',
        ]);
    }

    //Register
    public function viewRegister(){
        return view('register');
    }

    public function store(Request $request){
        $validation = Validator::make($request->all(),
            [
                'name' => 'required',
                'email' => 'required|email:dns|unique:users',
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

        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->user_type = 'member';
        $newUser->email = $request->email;
        $newUser->password = Hash::make($request->password);
        $newUser->created_at = now();
        $newUser->updated_at = now();
        $newUser->save();    
        

        return redirect()->route('login')->with('register_success', '<b>Registration successful!</b> Please login to your account!');
    }


    //logout
    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('dashboard')->with('logout_success', '<b>You just logged out from your account!</b> You are logged in as guest now!');
    }
}
