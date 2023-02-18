<?php

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
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index'])->name('itemindex');
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/edit/{id}', [App\Http\Controllers\ItemController::class, 'Item_update'])->name('itemupdate');    
    Route::get('/edit/{id}', [App\Http\Controllers\ItemController::class, 'Item_edit'])->name('itemedit');    
    Route::post('/destroy/{id}', [App\Http\Controllers\ItemController::class, 'Item_destroy'])->name('itemdestroy');    
});


Route::prefix('users')->group(function () {
    Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('userindex');

});
