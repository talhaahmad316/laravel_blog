<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserMail;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('welcome');
    }
    /**
     * Ragister all users in date base and validation
     */
    public function store(Request $request)
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
        $user->password=$request->password;
        $user->save();
        // Mail is used for send email 
        $detail=$request->all();
        Mail::to('talhaahmad3162@gmail.com')->send(new UserMail($detail));
        return redirect('/login')->withErrors(['register' => 'User Registered Successfully']);
    }
    //   User login 
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
            return redirect('/');
        }
        return redirect('login')->withErrors(['error' => 'Invalid login details']);
    }

    // Logout Function
    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect('login');
    }
}