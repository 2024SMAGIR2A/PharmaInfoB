<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PharmacieController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AvisController;
use App\Http\Controllers\AuthController;

// Redirection par défaut (optionnel, si vous souhaitez définir une page d'accueil)
Route::get('/', function () {
    return view('login'); // Remplacez 'welcome' par le nom de votre vue d'accueil
})->name('login');
Route::get('/search', function () {
    return view('search');
})->name('search');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route pour afficher le formulaire de connexion
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Route pour traiter la soumission du formulaire
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/pharmacies/search', [PharmacieController::class, 'pharmacieSearch'])->name('pharmacies.search');
// Routes ressources pour les pharmacies
Route::resource('pharmacies', PharmacieController::class);

// Routes ressources pour les users
Route::resource('users', UserController::class);

Route::resource('avis', AvisController::class);

// Profil utilisateur (si vous voulez le garder public)
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');