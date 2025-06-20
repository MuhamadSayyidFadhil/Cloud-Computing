<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginSiswa()
    {
        return view('auth.login', ['role' => 'siswa']);
    }

    public function loginSiswa(Request $request)
    {
        return $this->loginWithRole($request, 'siswa');
    }

    public function showLoginGuru()
    {
        return view('auth.login', ['role' => 'guru']);
    }

    public function loginGuru(Request $request)
    {
        return $this->loginWithRole($request, 'guru');
    }

private function loginWithRole(Request $request, $expectedRole)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        if (Auth::user()->role === $expectedRole) {
            // Cek role lalu redirect ke dashboard yang sesuai
            if ($expectedRole === 'guru') {
                return redirect()->route('dashboard.guru');
            } else {
                return redirect()->route('dashboard.siswa');
            }
        } else {
            Auth::logout();
            return back()->with('error', 'Anda bukan ' . $expectedRole);
        }
    }

    return back()->with('error', 'Email atau password salah');
}


public function showRegisterSiswa()
{
    return view('auth.register', ['role' => 'siswa']);
}

public function showRegisterGuru()
{
    return view('auth.register', ['role' => 'guru']);
}


    public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
        'role' => 'required|in:siswa,guru',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => $request->role,
    ]);

    // Redirect berdasarkan role
    if ($request->role === 'guru') {
        return redirect()->route('login.guru')->with('success', 'Akun guru berhasil dibuat. Silakan login.');
    } else {
        return redirect()->route('login')->with('success', 'Akun siswa berhasil dibuat. Silakan login.');
    }
}
public function logout()
{
    Auth::logout(); // Hapus session login
    return redirect('/login')->with('success', 'Berhasil logout');
}

}
