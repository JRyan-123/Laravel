<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware('auth')->group(function ()
{

    Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function () {
        Route::get('dashboard', [AdminController::class, 'AdminDashboard'])->name('dashboard');
        Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
        Route::post('profile/update', [AdminController::class, 'AdminProfileUpdate'])->name('profile.update');
        Route::get('edit/password', [AdminController::class, 'AdminEditPassword'])->name('edit.password');
        Route::post('update/password', [PasswordController::class, 'update'])->name('update.password');
        Route::get('accounts', [AdminController::class, 'AdminAccounts'])->name('accounts');
        Route::get('view/{viewUser}', [AdminController::class, 'AdminViewUser'])->name('user');
    });
    // End Admin 


    Route::prefix('agent')->name('agent')->middleware('role:agent')->group(function () {
        Route::get('dashboard', [AgentController::class, 'AgentDashboard'])->name('dashboard');
    });
    // End Agent

    Route::resource('posts', PostController::class);

});
// End Auth

