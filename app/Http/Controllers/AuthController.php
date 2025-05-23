<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['regex:/^[A-Za-z\s]+$/', 'required', 'max:255'],
            'email' => ['email', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', 'required', 'unique:users'],
            'password' => ['required', 'min:6', 'confirmed']
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        Auth::login($user);

        event(new Registered($user));

        return redirect()->route('dashboard');
    }

    public function loginUser(Request $request){
        $request->validate([
            'email' => ['email', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', 'required'],
            'password' => ['required']
        ]);

        if(Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ], $request->has('remember'))){
            return redirect()->intended();
        }else{
            return back()->withErrors(['errors' => 'The provided credentials does not match our record']);
        }
    }

    //Email Verification Notice
    public function verifyNotice()
    {
        return view('auth.verify-email');
    }

    //Email Verification Handler
    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->route('dashboard');
    }

    //Resending the Verification Email
    public function resendEmail(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }
}
