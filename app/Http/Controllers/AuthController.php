<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm(){
        return view('auth.login');
    }
    public function login(UserLoginRequest $request){
        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials)) {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
        return redirect()->route('dashboard');
    }

    public function registerForm()
    {
        return view('auth.register');
    }
    public function register(UserRegisterRequest $request){
        $user=User::create($request->all());
        if($user){
            Auth::login($user);
            return redirect()->route('dashboard');
        }
        return redirect()->back()->with('error', 'Something went wrong');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
