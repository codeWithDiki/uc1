<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Posts;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produk', Posts::class);

Route::middleware(['auth:sanctum', 'verified','checkakses:client'])->get('/client', function () {
    return view('liveware.produk');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified','checkakses:cs'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
