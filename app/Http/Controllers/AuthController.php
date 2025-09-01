<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ActivityLog;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        // Jika user sudah login, redirect ke dashboard
        if (Auth::check()) {
            return $this->redirectToDashboard();
        }
        
        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Coba authenticate dengan username
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
            $request->session()->regenerate();
            
            // Log aktivitas login
            ActivityLog::create([
                'user_id' => Auth::id(),
                'activity' => 'Login',
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'login_at' => now()
            ]);

            return $this->redirectToDashboard();
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->withInput($request->only('username', 'remember'));
    }

    // Redirect ke dashboard berdasarkan role
    private function redirectToDashboard()
    {
        $user = Auth::user();
        
        if ($user->isAdmin() || $user->isStaff()) {
            return redirect()->route('admin.dashboard');
        }
        
        return redirect()->route('warga.dashboard');
    }

    // Dashboard umum yang mengarahkan berdasarkan role
    public function dashboard()
    {
        return $this->redirectToDashboard();
    }

    // Proses logout
    public function logout(Request $request)
    {
        // Log aktivitas logout
        if (Auth::check()) {
            ActivityLog::where('user_id', Auth::id())
                ->whereNull('logout_at')
                ->update(['logout_at' => now()]);
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}