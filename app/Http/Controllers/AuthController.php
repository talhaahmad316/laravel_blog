<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserMail;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display welcome Page.
     */
    public function index()
    {
        return view('welcome');
    }
    // Display Registretion page
    public function registerpage()
    {
        return view('auth.register');
    }
    /**
     * Ragister all users in date base and validation
     */
    public function register(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        // Data Enter into Database
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        // Mail is used for send email 
        Mail::to('talhaahmad3162@gmail.com')->send(new UserMail($user));
        return redirect('user/loginpage')->withErrors(['register' => 'User Registered Successfully']);
    }
    function verifyEmail($id)
    {
        $id = decrypt($id);
        $user = User::findOrFail($id);
        $user->email_verified_at = now();
        $user->save();
    }
    // Show Login page
    public function loginpage()
    {
        return view('auth.login');
    }
    //   User login and Validation
    public function login(Request $request)
    {
        // Validation
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        // login start
        if (Auth::attempt($request->only('email', 'password'))) {
            if (Auth::user()->email_verified_at !== null) {
                $user = Auth::user();
                return redirect('/')->withCreate('You are logged in successfully, ' . $user->name);
            } else {
                Auth::logout();
                return redirect('user/loginpage')->withErrors(['error' => 'Please verify your email address before logging in!']);
            }
        }
        return redirect('user/loginpage')->withErrors(['error' => 'Invalid login details']);
    }
    // Logout Function
    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect('user/loginpage');
    }
}