<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Affiche la vue de connexion.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Gère la connexion de l'utilisateur.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('dashboard');
            } elseif ($user->role === 'pharmacien') {
                return redirect()->route('pharamcien.dashboard');
            } elseif ($user->role === 'explorer') {
                return redirect()->route('explorer.dashboard');
            } else {
                Auth::logout();
                return redirect()->route('login')->withErrors(['error' => 'Rôle utilisateur invalide.']);
            }
        }
    
        return back()->withErrors(['email' => 'Les informations d’identification ne sont pas valides.'])->withInput();
    }
    

    /**
     * Déconnecte l'utilisateur.
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
