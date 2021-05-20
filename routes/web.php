<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Posts;
use App\Http\Livewire\Cs;
use App\Http\Livewire\Admin;
use App\Models\Post;

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

Route::get('/produk/{id}', function ($id) {
	$produk = Post::all()->where('id',$id);
	$r = array(
		'posts' => $produk
	);
	if(count($produk) > 0){
    	return view('produk', $r);
    }
    App::abort(404);
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
