<?php
use Illuminate\Support\Facades\Route;
use App\Livewire\LoginForm;
use App\Livewire\RegisterForm;
use App\Livewire\Products;

// Only guests can access login and register
Route::middleware('guest')->group(function () {
    Route::get('/login', LoginForm::class)->name('login');
    Route::get('/register', RegisterForm::class)->name('register');
});

// Only authenticated users can access logout and products
Route::middleware('auth')->group(function () {
    Route::post('/logout', function () {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    })->name('logout');
    Route::get('/products', Products::class)->name('products.index');
});

// Redirect root to products
Route::get('/', function () {
    return redirect(route('products.index'));
});