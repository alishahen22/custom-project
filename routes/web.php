<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController;

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


Route::namespace('Site')->name('site.')->middleware('lang')->group(function () {

        Route::get('/', function () {
            return view('welcome');
        });

    Route::get('/lang/{lang}', [HomeController::class,'lang'])->name('lang');
});

