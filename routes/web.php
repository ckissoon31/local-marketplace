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

// Route::middleware(['auth', 'seller'])->get('/test-user', function () {
//     $user = request()->user(); // current authenticated user
//     return [
//         'id' => $user->id,
//         'name' => $user->name,
//         'email' => $user->email,
//         'roles' => $user->roles->pluck('name'), // list of role names
//     ];
// });
Route::middleware(['auth', 'role:buyer'])->get('/buyer/dashboard', function () {
    $user = request()->user(); // current authenticated user
    return [
        'id' => $user->id,
        'name' => $user->name,
        'email' => $user->email,
        'roles' => $user->roles->pluck('name'), // list of role names
    ];
});
Route::middleware(['auth', 'role:seller'])->get('/seller/dashboard', function () {
    $user = request()->user(); // current authenticated user
    return [
        'id' => $user->id,
        'name' => $user->name,
        'email' => $user->email,
        'roles' => $user->roles->pluck('name'), // list of role names
    ];
});
Route::middleware(['auth', 'role:administrator'])->get('/admin/dashboard', function () {
    $user = request()->user(); // current authenticated user
    return [
        'id' => $user->id,
        'name' => $user->name,
        'email' => $user->email,
        'roles' => $user->roles->pluck('name'), // list of role names
    ];
});


require __DIR__.'/settings.php';
