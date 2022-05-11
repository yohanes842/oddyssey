<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class LoginController extends Controller
{
    public function create(){
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

        if (Auth::attempt($request->except('_token'))) {
            $users = User::where('email', $request->email)->get()->first();
            
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard')->with('login_success', 'Hi, <b>'.$users->name.'</b>! Welcome to Oddyssey!');
        }
        
        return back()->withErrors([
            'login' => '<b>Login Error!</b> The email and password do not match!',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/dashboard')->with('logout_success', '<b>You just logged out from your account!</b> You are logged in as guest now!');
    }
}
