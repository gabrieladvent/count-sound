<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('input-suara/caleg/tps', [DashboardController::class, 'input_view'])->name("input");
Route::post('proses-jumlah-tps', [DashboardController::class, 'proses_tps'])->name('take-tps');
Route::post('input-suara/proses', [DashboardController::class, 'proses_input'])->name('input-suara');
Route::get('hasil-suara/caleg', [DashboardController::class, 'output_suara'])->name('hasil');
