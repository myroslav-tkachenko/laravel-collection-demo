<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function check(Request $request)
    {
        if (auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) return redirect('/');

        return redirect('login');
    }

    public function logout()
    {
        auth()->logout();
        
        return redirect('/login');
    }
}
