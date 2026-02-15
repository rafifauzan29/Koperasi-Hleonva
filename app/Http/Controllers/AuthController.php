<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Check if the authenticated user is an admin
        if (Auth::user()->is_admin) {
            // Redirect to customer dashboard for admin
            return redirect()->route('dashboard.index')->with('success', 'Login berhasil.');
        } else {
            // Redirect to regular dashboard for non-admin users
            return redirect()->route('customer-dashboard.index')->with('success', 'Login berhasil.');
        }
    }

    return back()->with('error', 'Login gagal. Silakan coba lagi.');
}

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        if (User::create($validatedData)) {
            return redirect(route('login'))->with('success', 'Registrasi berhasil. Silakan login.');
        } else {
            return redirect()->back()->with('error', 'Registrasi gagal. Silakan coba lagi.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Logout berhasil.');
    }
}
