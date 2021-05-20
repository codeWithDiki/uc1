<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Posts;
use App\Http\Livewire\Cs;
use App\Http\Livewire\Admin;

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


Route::group(['middleware' => ['auth:sanctum', 'verified','checkakses:client']], function () {
    Route::get('/client', Posts::class)->name('dashboard');
});


Route::group(['middleware' => ['auth:sanctum', 'verified','checkakses:cs']], function () {
    Route::get('/cs', Cs::class)->name('dashboard');
});

Route::group(['middleware' => ['auth:sanctum', 'verified','checkakses:admin']], function () {
    Route::get('/admin', Admin::class)->name('dashboard');
});

Route::middleware(['auth:sanctum', 'verified','checkakses:cs'])->get('/dashboard', function () {
    return redirect('/cs');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified','checkakses:client'])->get('/dashboard', function () {
    return redirect('/client');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified','checkakses:admin'])->get('/dashboard', function () {
    return redirect('/admin');
})->name('dashboard');
