<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MenuLinkController;
use App\Http\Controllers\Admin\CompanyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider, and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Create a new user
    Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');

    // View a user
    Route::get('/users/{user}', [UserController::class, 'show'])->name('admin.users.show');

    // Edit a user
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('admin.users.update');

    // Delete a user
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    // List all users
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
});

Route::middleware(['auth', 'admin'])->prefix('menu-link')->group(function () {
    // Create a new menu link
    Route::get('/menu_links/create', [MenuLinkController::class, 'create'])->name('admin.menu_links.create');
    Route::post('/menu_links', [MenuLinkController::class, 'store'])->name('admin.menu_links.store');

    // View a menu link
    Route::get('/menu_links/{menu_link}', [MenuLinkController::class, 'show'])->name('admin.menu_links.show');

    // Edit a menu link
    Route::get('/menu_links/{menu_link}/edit', [MenuLinkController::class, 'edit'])->name('admin.menu_links.edit');
    Route::put('/menu_links/{menu_link}', [MenuLinkController::class, 'update'])->name('admin.menu_links.update');

    // Delete a menu link
    Route::delete('/menu_links/{menu_link}', [MenuLinkController::class, 'destroy'])->name('admin.menu_links.destroy');

    // List all menu links
    Route::get('/menu_links', [MenuLinkController::class, 'index'])->name('admin.menu_links.index');
});

Route::middleware(['auth', 'admin'])->prefix('company')->group(function () {
    Route::resource('companies', CompanyController::class);
    // Create a new menu link
    Route::get('/companies/create', [CompanyController::class, 'create'])->name('admin.companies.create');
    Route::post('/companies', [CompanyController::class, 'store'])->name('admin.companies.store');

    // View a menu link
    Route::get('/companies/{company}', [CompanyController::class, 'show'])->name('admin.companies.show');

    // Edit a menu link
    Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])->name('admin.companies.edit');
    Route::put('/companies/{company}', [CompanyController::class, 'update'])->name('admin.companies.update');

    // Delete a menu link
    Route::delete('/companies/{company}', [CompanyController::class, 'destroy'])->name('admin.companies.destroy');

    // List all menu links
    Route::get('/companies', [CompanyController::class, 'index'])->name('admin.companies.index');
});

require __DIR__ . '/auth.php';
