<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\Publikasi\PengumumanController;
use App\Http\Controllers\Admin\Publikasi\BeritaController;
use App\Http\Controllers\Admin\Data_Pengadaan\TenderController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [AuthenticatedSessionController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('2fa')->group(function(){
//    Route::get('/home', [AuthenticatedSessionController::class, 'index'])->name('dashboard');
//    Route::post('/2fa', function(){
//     return redirect(route('dashboard'));
//    })->name('2fa');
// });

// Route::get('/complete-registration', [RegisteredUserController::class, 'completeRegistration'])->name('complete.registration');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman');
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
    Route::get('/tender', [TenderController::class, 'index'])->name('tender');  
});


require __DIR__.'/auth.php';