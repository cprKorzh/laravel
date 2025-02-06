<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/apply', [ReportController::class, 'create'])->name('dashboard');
    Route::post('/apply', [ReportController::class, 'store'])->name('report.store');

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/admin/reports', [AdminController::class, 'index'])->name('admin.reports');
        Route::post('/admin/reports/{report}/approve', [AdminController::class, 'approve'])->name('admin.reports.approve');
        Route::post('/admin/reports/{report}/reject', [AdminController::class, 'reject'])->name('admin.reports.reject');
    });
});



require __DIR__ . '/auth.php';
