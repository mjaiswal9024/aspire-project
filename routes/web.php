<?php

use App\Http\Controllers\LoanController;
use App\Http\Controllers\UserController;
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

Route::post('/signUp', [UserController::class, 'signUp']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);

Route::post('/applyLoan', [LoanController::class, 'applyLoan']);
Route::get('/approveLoan/{id}', [LoanController::class, 'approveLoan']);
Route::get('/rejectLoan/{id}', [LoanController::class, 'rejectLoan']);

