<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Redirect;

class AuthController extends Controller
{
    public function formlogin()
    {
        return view('login', [
            'title' => 'login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request){
        
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){
            // Redirect ke dashboard jika berhasil login
            $request->session()->regenerate();
            
            return redirect()->intended('/dashboard'); // Pastikan route 'dashboard' ada
        } 

        // Jika gagal login, flash pesan kesalahan
        return back()->with('loginError', 'login failed!');
    }

        // Periksa kredensial pengguna
        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect('/login');
        //     // if(Auth::user()->role==='Admin') {
        //     //     return redirect()->route('dashboard');
        //     // }
        // } else {
        //     return redirect('/dashboard');
        // }


    public function index()
    {
        return view('index');
    }


    public function dashboard()
    {
        return Redirect('/dashboard');
    }
    // public function logout(Request $request)
    // {
    //     Auth::logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();
    //     return redirect('/login');
    // }
}
