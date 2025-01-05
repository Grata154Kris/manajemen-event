<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Redirect;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
        
    }

    public function authenticating(Request $request){
        
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Periksa kredensial pengguna
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect ke dashboard jika berhasil login
            return redirect()->intended('/'); // Pastikan route 'dashboard' ada
        } else {

            // Jika gagal login, flash pesan kesalahan
            Session::flash('status', 'failed');
            Session::flash('message', 'Login salah, silakan coba lagi.');
    
            return redirect('/');
        }

    }


    public function index()
    {
        return view('index');
    }


    public function dashboard(Request $request, $user)
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
