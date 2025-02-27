<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Display all people

Route::get('people', [PersonController::class, 'index'])->name('people.index');

// Make sure the routes related to creating and storing a person are behind authentication
Route::middleware('auth')->group(function () {
    Route::get('/people/create', [PersonController::class, 'create'])->name('people.create');
    Route::post('/people', [PersonController::class, 'store'])->name('people.store');
});

// Add this route for login
Route::get('login', function () {
    return view('auth.login');
})->name('login');


// Display a specific person
Route::get('people/{person}', [PersonController::class, 'show'])->name('people.show');

// Define a route to check the degree of kinship
Route::get('/person/{id}/degree/{targetPersonId}', [PersonController::class, 'checkDegree'])
    ->name('person.checkDegree');


require __DIR__.'/auth.php';
