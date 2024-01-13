<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

Route::Get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');
