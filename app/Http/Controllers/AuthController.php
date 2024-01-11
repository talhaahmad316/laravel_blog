<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserMail;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
        ]);
        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->save();
        $detail=$request->all();
        Mail::to('talhaahmad3162@gmail.com')->send(new UserMail($detail));
        return redirect()->route('user.login');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $users=User::paginate(10);
        return view('auth.registered_user',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
