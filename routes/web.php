<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/rendus', function () {
    return view('rendus');
})->name('rendus');

Route::get('/dashboard',[\App\Http\Controllers\DashboardController::class,'View'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/topdix',[\App\Http\Controllers\DashboardController::class,'ViewTopDix'])
    ->middleware(['auth', 'verified'])->name('topdix');

Route::get('/topcinq',[\App\Http\Controllers\DashboardController::class,'ViewTopCinq'])
    ->middleware(['auth', 'verified'])->name('topcinq');

Route::get('/volume',[\App\Http\Controllers\DashboardController::class,'ViewVolume'])
    ->middleware(['auth', 'verified'])->name('volume');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
