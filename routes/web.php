<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

Route::get('/stock', function () {
    return view('stock');
});

Route::get('/stock', [ApiController::class, 'index'])->name('index');
Route::post('/consultarAcao', [ApiController::class, 'consultarAcao'])->name('consultarAcao');