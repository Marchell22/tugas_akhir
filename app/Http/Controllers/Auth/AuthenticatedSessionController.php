<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }


    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        try {
            $request->authenticate();
            $request->session()->regenerate();
            $user = Auth::user();
        } catch (\Exception $e) {
            Log::error('Authentication failed: ', ['email' => $request->email, 'error' => $e->getMessage()]);
            return redirect()->back()->withErrors(['email' => 'Login failed.']);
        }
        if ($user->role === 'admin') {
            return redirect()->intended(route('admin.AkunTransaksi')); // Redirect to admin dashboard
        } elseif ($user->role === 'user') {
            return redirect()->intended(route('user.AkunTransaksi')); // Redirect to user dashboard
        }
        return redirect()->intended(route('login', false));


       
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
