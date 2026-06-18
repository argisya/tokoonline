<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\Produk; 
use App\Models\Kategori; 
use App\Models\FotoProduk; 
use App\Helpers\ImageHelper;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginBackend()
    {
        return view('backend.v_login.login', [
            'judul' => 'Login',
        ]);
    }

    public function authenticateBackend(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email', 
            'password' => 'required'
        ]);
        

        if (Auth::attempt($credentials)) {
            if (Auth::user()->status == 0) {
                Auth::logout();
                return back()->with('error', 'User belum aktif');
            }
            $request->session()->regenerate();
            return redirect()->intended(route('backend.beranda'));
        }
        return back()->with('error','Login Gagal, Cek Email dan Password Anda!');
    }
    
    public function logoutBackend(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('backend.login');
    }
}
