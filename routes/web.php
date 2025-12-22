<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth'])->group(function(){





Route::middleware(['role:buyer'])
    ->get('/buyer/dashboard', function () {
    
    $user = request()->user(); // current authenticated user
    return Inertia::render('Buyer/Dashboard', [

            'user' => auth()->user()->only(['id', 'name', 'email']),

    ]);
})->name('buyer_dashboard');

Route::middleware(['role:seller'])->get('/seller/dashboard', function () {
    $user = request()->user(); // current authenticated user
    return Inertia::render('Seller/Dashboard');
});
Route::middleware(['role:administrator'])->get('/admin/dashboard', function () {
    $user = request()->user(); // current authenticated user
     return Inertia::render('Admin/Dashboard');
});
   
});






require __DIR__.'/settings.php';
