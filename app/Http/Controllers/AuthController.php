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
    public function registerpage( )
    {
        return view('auth.register');
    }
    /**
     * Ragister all users in date base and validation
     */
    public function register(Request $request)
    {
        // Validation Start
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
        ]);
        // Data Enter into Database
        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password = Hash::make($request->password); 
        $user->save();
        // Mail is used for send email 
        $detail=$request->all();
        Mail::to('talhaahmad3162@gmail.com')->send(new UserMail($detail));
        return redirect('user/loginpage')->withErrors(['register' => 'User Registered Successfully']);
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
            'email'=>'required',
            'password'=>'required',
        ]);
        // login start
        if(Auth::attempt($request->only('email','password'))) 
        {
            $user = Auth::user(); 
            return redirect('/')->withCreate('You are logged in successfully, ' . $user->name);
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