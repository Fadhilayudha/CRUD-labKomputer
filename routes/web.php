<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LabKomputerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BrokenController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', function () {
//     return view('dashboard');
// });
// Route::get('/create', [LabKomputerController::class, 'create'])->name('create');


// Route::middleware('isGuest')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    });
    Route::post('/login', [LoginController::class, 'login'])->name('login');
// });

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::middleware('isLogin')->group(function () {
    // Route::resource('dashboard', LabKomputerController::class); 
    Route::resource('lab-komputer', LabKomputerController::class);
    Route::get('/broken', [BrokenController::class,'index'])->name('broken.index');
// });



