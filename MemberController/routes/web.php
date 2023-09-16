<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MemberController;
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
Route::get('/top',[MemberController::class, 'top']);

Route::get('/register', [MemberController::class, 'register']);
Route::post('/memberRegister',[MemberController::class, 'memberRegister']);


Route::get('/edit/{id}',[MemberController::class, 'edit']);
Route::post('/memberEdit', [MemberController::class, 'memberEdit']);

Route::get('/memberDelete/{id}', [MemberController::class, 'memberDelete']); 



//test
Route::get('/input',function () {
    return view('input');
});

Route::post('/next', [MemberController::class, 'index']);