<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CalculateController;
use App\Http\Controllers\UrlController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/link',[UserController::class,'index'])->name('user.links')->middleware('auth');
Route::get('/allLink',[UserController::class,'allLink'])->name('user.allLink');


Route::post('/short',[UrlController::class,'short'])->name('short.url');
Route::post('/edit',[UrlController::class,'edit'])->name('short.edit');
Route::post('/destroy',[UrlController::class,'destroy'])->name('short.destroy');
Route::get('/{code}',[UrlController::class,'show'])->name('short.show');

Route::post('/cal',[CalculateController::class,'cal'])->name('calculate.cal');


