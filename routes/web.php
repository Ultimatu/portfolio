<?php

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

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('home');
Route::post('/contact', [App\Http\Controllers\MainController::class, 'contact'])->name('contact');
Route::post('/subscribe', [App\Http\Controllers\MainController::class, 'subscribe'])->name('newsletter.subscribe');
Route::post('/unsubscribe', [App\Http\Controllers\MainController::class, 'unSubscribe'])->name('newsletter.unsubscribe');
