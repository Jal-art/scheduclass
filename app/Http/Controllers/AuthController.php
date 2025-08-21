<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        // Pakai layout auth (tanpa sidebar)
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => ['required','email'],
            'password' => ['required'],
        ]);

        // Auth::attempt bisa pakai kolom custom untuk pencarian user
        $credentials = [
            'usr_email' => $request->email,
            'password'  => $request->password, // akan dicocokkan dengan getAuthPassword()
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors(['email' => 'Email atau password salah'])->withInput();
    }

    public function showRegisterForm()
    {
        // tampilkan role Siswa & Guru saja (sesuaikan nama di seeds kamu)
        $roles = Role::whereIn('rl_name', ['Student','Siswa','Guru','Teacher'])->get();
        return view('auth.register', compact('roles'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'usr_name'                  => ['required','string','max:255'],
            'usr_email'                 => ['required','email','max:255','unique:users,usr_email'],
            'password'                  => ['required','min:6','confirmed'],
            'usr_role_id'               => ['required','exists:roles,rl_id'],
        ]);

        $user = User::create([
            'usr_name'        => $request->usr_name,
            'usr_email'       => $request->usr_email,
            'usr_password'    => Hash::make($request->password),
            'usr_role_id'     => $request->usr_role_id,
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
