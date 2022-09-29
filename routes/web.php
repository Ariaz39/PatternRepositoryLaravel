<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';

Route::controller(ProductController::class)
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/show/{product_id}', 'show')->name('show');
        Route::get('/edit/{product_id}', 'edit')->name('edit');
        Route::put('/update/{product_id}', 'update')->name('update');
        Route::delete('/delete/{product_id}', 'destroy')->name('delete');
    });
