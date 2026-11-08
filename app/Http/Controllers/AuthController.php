<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Menampilkan halaman register
    public function showRegister()
    {
        return view('auth.register');
    }

    // Memproses pendaftaran akun
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:users,email',
            'no_hp' => 'nullable|string|max:20',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
            'role' => 'customer',
        ]);

        return redirect()
            ->route('login')
            ->with('success', 'Pendaftaran berhasil. Silakan login.');
    }

    // Menampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Memproses login
   
public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (!Auth::attempt($credentials)) {
        return back()
            ->withErrors([
                'email' => 'Email atau password salah.',
            ])
            ->onlyInput('email');
    }

    $request->session()->regenerate();

    $user = Auth::user();

    // ADMIN MASUK KE HALAMAN UTAMA TOKO
    if ($user->role === 'admin') {
        return redirect()
            ->route('home')
            ->with('success', 'Selamat datang di SportZone.');
    }

    // CUSTOMER MASUK KE DASHBOARD CUSTOMER
    if ($user->role === 'customer') {
        return redirect()
            ->route('customer.dashboard')
            ->with('success', 'Selamat datang di SportZone.');
    }

    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()
        ->route('login')
        ->withErrors([
            'email' => 'Role akun tidak dikenali.',
        ]);
}


    // Memproses logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
