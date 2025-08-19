<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AuthController extends Controller
{
    /**
     * Show login form
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle login process
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            "usr_email" => "required | max:255",
            "usr_password" => "required | max:255",
        ]);
               $user = User::where('usr_email', $request->usr_email)->first();

        if ($user && Hash::check($request->usr_password, $user->usr_password)) {
            Auth::login($user);
            $request->session()->regenerate();

            return redirect()->intended('/dashboard'); // ubah sesuai route kamu
        }
        return back()->withErrors([
            'usr_email' => 'Email atau password salah.',
        ])->onlyInput('usr_email');
    }

    /**
     * Show register form
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Handle register process
     */
    public function register(Request $request)
{
    $request->validate([
        'usr_name' => 'required|string|max:255',
        'usr_email' => 'required|email|unique:users,usr_email',
        'usr_password' => 'required|min:8|confirmed',
        'usr_role_id' => 'required|in:2,3', // 2 = siswa, 3 = guru (contoh)
    ]);

    User::create([
        'usr_name' => $request->usr_name,
        'usr_email' => $request->usr_email,
        'usr_password' => Hash::make($request->usr_password),
        'usr_role_id' => $request->usr_role_id,
    ]);

    return redirect()->route('login')->with('success', 'Akun berhasil dibuat, silakan login!');
}


    /**
     * Handle logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
