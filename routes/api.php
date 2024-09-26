<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('localization')->namespace('API')->group(function () {

    Route::post('login', 'UserController@login');
    Route::post('register', 'UserController@register');
    Route::post('user/verificationCode', 'UserController@activeCode');
    Route::post('user/forget/password', 'UserController@forgetPassword');
    Route::post('user/code/check/password', 'UserController@checkCode');
    Route::post('user/reset/password', 'UserController@resetPassword');
    Route::get('user/logout', 'UserController@logout')->middleware('auth:sanctum');



    // ===========================User Profile=========================== //
    Route::middleware('auth:sanctum')->group(function () {

        });


    });




