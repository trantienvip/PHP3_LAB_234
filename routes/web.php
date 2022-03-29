<?php

use App\Http\Controllers\CpanelControllers\ProductController;
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
Route::prefix('/cpanel')->name('cpanel.')->group(function () {
    Route::get('/', [ProductController::class, 'dashboard'])->name('dashboard');
    Route::delete('/delete/{id}', [ProductController::class, 'delete'])->name('delete');
});