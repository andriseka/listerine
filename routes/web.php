<?php

use App\Http\Controllers\QrCodeController;
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

Route::get('/qrcode/generate/{parameter}', [QrCodeController::class, 'get_scan'])->name('qrcode.get-scan');


Route::get('/qrcode', [QrCodeController::class, 'index'])->name('qrcode.index');
Route::post('/qrcode', [QrCodeController::class, 'store'])->name('qrcode.store');
Route::delete('/qrcode/{slug}', [QrCodeController::class, 'destroy'])->name('qrcode.destroy');
