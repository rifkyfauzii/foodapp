<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {   
       $validatedData = $request->validate([
            'name' => ['required','min:3','max:255','unique:users'],
            'email' => ['required','email:dns','unique:users'],
            'password' => ['required','min:5','max:255'],
            'role' => ['required'],
       ]);

       $validatedData['password'] = bcrypt($validatedData['password']); // hash password agar tidak keliatan

       User::create($validatedData);

       return redirect('/login')->with('success', 'Registrasi Berhasil, Silahkan Login !');
    }


}
