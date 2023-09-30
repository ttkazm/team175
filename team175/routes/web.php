<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Models\Item;

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
Route::get('/items',[App\Http\Controllers\ItemController::class,'index'])->name('items');
Route::post('/search',[App\Http\Controllers\ItemController::class,'KeySearch'])->name('search');
Route::get('/search',[App\Http\Controllers\ItemController::class,'search'])->name('search');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('store', [ItemController::class, 'show'])->name('name');
Route::get('store', [ItemController::class, 'types']);
Route::post('store', [ItemController::class, 'store'])->name('store');
