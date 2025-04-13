<?php

namespace App\Http\Controllers;

use App\Mail\VerificationMail;
use App\Models\User;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function loginForm() {
        return view('login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'email|required',
            'password' => 'string|required'
        ]);



        $login = Auth::attempt($request->only('email','password'));

        if($login){

            $user = Auth::user();

            if($user->email_verified_at){
                return redirect('/products');
            }

            return back()->with('error', 'Your email is not verified');

        }

        return back()->with('error', 'Credentials does not exist');
    }

    public function registrationForm() {
        return view('/register');
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }

    public function register(Request $request){
        $request->validate([
            'first_name' => 'string|required',
            'last_name' => 'string|required',
            'phone' => 'string|required',
            'designation' => 'string|required',
            'email' => 'email|required|unique:users',
            'password' => 'string|required',
        ]);


        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'designation' => $request->designation,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->remember_token = Str::random(64);
        $user->save();

        Mail::to($user)->send(new VerificationMail($user));

        return redirect()->route('login')->with('status', 'verification link sent to email');
    }

    public function verify($token){
        $user = User::where('remember_token', $token)->first();
        if($user){
            $user->email_verified_at = now();
            $user->save();
        }

        return redirect()->route('login')->with('status', 'account verified');

    }

}